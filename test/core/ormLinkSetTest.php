<?php
// Copyright (c) 2010-2021 Combodo SARL
//
//   This file is part of iTop.
//
//   iTop is free software; you can redistribute it and/or modify
//   it under the terms of the GNU Affero General Public License as published by
//   the Free Software Foundation, either version 3 of the License, or
//   (at your option) any later version.
//
//   iTop is distributed in the hope that it will be useful,
//   but WITHOUT ANY WARRANTY; without even the implied warranty of
//   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//   GNU Affero General Public License for more details.
//
//   You should have received a copy of the GNU Affero General Public License
//   along with iTop. If not, see <http://www.gnu.org/licenses/>
//


/**
 * Created by PhpStorm.
 * User: Eric
 * Date: 20/12/2017
 * Time: 11:56
 */


namespace Combodo\iTop\Test\UnitTest\Core;

use Combodo\iTop\Test\UnitTest\ItopDataTestCase;
use Exception;
use ormLinkSet;


/**
 * @group itopRequestMgmt
 * @group itopConfigMgmt
 * Tests of the ormLinkSet class using N-N links between FunctionalCI and Contact
 *
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 * @backupGlobals disabled
 */
class ormLinkSetTest extends ItopDataTestCase
{
	const CREATE_TEST_ORG = true;

	/**
	 * @throws Exception
	 */
	protected function setUp()
	{
		parent::setUp();
	}

	/**
	 *
	 */
	public function testConstruct()
	{
		$oOrmLink = new ormLinkSet('UserRequest', 'contacts_list');
		static::assertNotNull($oOrmLink);
	}

	/**
	 *
	 */
	public function testConstruct2()
	{
		$this->expectException('Exception');

		new ormLinkSet('UserRequest', 'ref');
	}

	/**
	 * @throws Exception
	 */
	public function testBasic()
	{
		$oServer = $this->CreateServer(1);
		$aPersons = array();
		for ($i = 0; $i < 3; $i++) {
			$oPerson = $this->CreatePerson($i);
			$aPersons[] = $oPerson;
			$this->AddContactToCI($oPerson, $oServer);
		}
		$oServer->DBUpdate();
		$this->ReloadObject($oServer);

		$oContactsSet = $oServer->Get('contacts_list');
		static::assertEquals(3, $oContactsSet->Count());
	}

	/**
	 * @throws Exception
	 */
	public function testSuccesiveAdds()
	{
		$oServer = $this->CreateServer(1);
		$aPersons = array();
		for ($i = 0; $i < 3; $i++) {
			$oPerson = $this->CreatePerson($i);
			$aPersons[] = $oPerson;
			$this->AddContactToCI($oPerson, $oServer);
		}
		$oServer->DBUpdate();
		$this->ReloadObject($oServer);

		$oContactsSet = $oServer->Get('contacts_list');
		static::assertEquals(3, $oContactsSet->Count());

		$this->AddContactToCI($this->CreatePerson($i), $oServer);
		$oContactsSet = $oServer->Get('contacts_list');
		static::assertEquals(4, $oContactsSet->Count());

		$oServer->DBUpdate();
		$this->ReloadObject($oServer);

		$oContactsSet = $oServer->Get('contacts_list');
		static::assertEquals(4, $oContactsSet->Count());
	}

	/**
	 * @throws Exception
	 */
	public function testRemove()
	{
		$oServer = $this->CreateServer(1);
		$aPersons = array();
		for ($i = 0; $i < 3; $i++) {
			$oPerson = $this->CreatePerson($i);
			$aPersons[] = $oPerson;
			$this->AddContactToCI($oPerson, $oServer);
		}
		$oServer->DBUpdate();
		$this->ReloadObject($oServer);

		$oContactsSet = $oServer->Get('contacts_list');
		static::assertEquals(3, $oContactsSet->Count());

		for ($i = 0; $i < 3; $i++) {
			$this->RemoveContactFromCI($aPersons[$i], $oServer);
		}
		$oContactsSet = $oServer->Get('contacts_list');
		static::assertEquals(0, $oContactsSet->Count());

		$oServer->DBUpdate();
		$this->ReloadObject($oServer);

		$oContactsSet = $oServer->Get('contacts_list');
		static::assertEquals(0, $oContactsSet->Count());
	}

	/**
	 * @throws Exception
	 */
	public function testAddThenRemove()
	{
		$oServer = $this->CreateServer(1);
		for ($i = 0; $i < 3; $i++) {
			$oPerson = $this->CreatePerson($i);
			$this->AddContactToCI($oPerson, $oServer);
			$this->RemoveContactFromCI($oPerson, $oServer);
		}
		$oContactsSet = $oServer->Get('contacts_list');
		static::assertEquals(0, $oContactsSet->Count());

		$oServer->DBUpdate();
		$this->ReloadObject($oServer);

		$oContactsSet = $oServer->Get('contacts_list');
		static::assertEquals(0, $oContactsSet->Count());
	}

	/**
	 * @throws Exception
	 */
	public function testRemoveThenAdd()
	{
		$oServer = $this->CreateServer(1);
		$aPersons = array();
		for ($i = 0; $i < 3; $i++) {
			$oPerson = $this->CreatePerson($i);
			$aPersons[] = $oPerson;
			$this->AddContactToCI($oPerson, $oServer);
		}
		$oServer->DBUpdate();
		$this->ReloadObject($oServer);

		$oContactsSet = $oServer->Get('contacts_list');
		static::assertEquals(3, $oContactsSet->Count());

		for ($i = 0; $i < 3; $i++) {
			$this->RemoveContactFromCI($aPersons[$i], $oServer);
			$this->AddContactToCI($aPersons[$i], $oServer);
		}
		$oContactsSet = $oServer->Get('contacts_list');
		static::assertEquals(3, $oContactsSet->Count());

		$oServer->DBUpdate();
		$this->ReloadObject($oServer);

		$oContactsSet = $oServer->Get('contacts_list');
		static::assertEquals(3, $oContactsSet->Count());
	}

	/**
	 * @throws Exception
	 */
	public function testAddDuplicate()
	{
		$oServer = $this->CreateServer(1);
		$aPersons = array();
		for ($i = 0; $i < 3; $i++) {
			$oPerson = $this->CreatePerson($i);
			$aPersons[] = $oPerson;
			$this->AddContactToCI($oPerson, $oServer);
		}
		$oServer->DBUpdate();
		$this->ReloadObject($oServer);

		$oContactsSet = $oServer->Get('contacts_list');
		static::assertEquals(3, $oContactsSet->Count());

		for ($i = 0; $i < 3; $i++) {
			$this->AddContactToCI($aPersons[$i], $oServer);
		}
		$oContactsSet = $oServer->Get('contacts_list');
		static::assertEquals(6, $oContactsSet->Count());

		$oServer->DBUpdate();
		$this->ReloadObject($oServer);

		$oContactsSet = $oServer->Get('contacts_list');
		static::assertEquals(3, $oContactsSet->Count());
	}

	/**
	 * @throws Exception
	 */
	public function testModifyThenRemove()
	{
		$oServer = $this->CreateServer(1);
		$aPersons = array();
		for ($i = 0; $i < 3; $i++) {
			$oPerson = $this->CreatePerson($i);
			$aPersons[] = $oPerson;
			$this->AddContactToCI($oPerson, $oServer);
		}

		$oServer->DBUpdate();
		$this->ReloadObject($oServer);

		for ($i = 3; $i < 6; $i++) {
			$oPerson = $this->CreatePerson($i);
			$this->AddContactToCI($oPerson, $oServer);
		}

		for ($i = 0; $i < 3; $i++) {
			$this->RemoveContactFromCI($aPersons[$i], $oServer);
		}

		$oContactsSet = $oServer->Get('contacts_list');
		static::assertEquals(3, $oContactsSet->Count());
	}

	/**
	 * @dataProvider ToDBObjectSetProvider
	 *
	 * @param $sHostClass
	 * @param $sAttCode
	 * @param $sOriginalFilter
	 * @param $bShowObsolete
	 * @param $sExpectedFilter
	 *
	 * @throws \CoreException
	 * @throws \CoreWarning
	 * @throws \MySQLException
	 * @throws \OQLException
	 */
	public function testToDBObjectSet($sHostClass, $sAttCode, $sOriginalFilter, $bShowObsolete, $sExpectedFilter)
	{
		$oOriginalSet = new \DBObjectSet(\DBSearch::FromOQL($sOriginalFilter));
		$oOrmLinkSet = new ormLinkSet($sHostClass, $sAttCode, $oOriginalSet);

		$oSet = $oOrmLinkSet->ToDBObjectSet($bShowObsolete);
		$this->assertEquals($sExpectedFilter, $oSet->GetFilter()->ToOQL());
	}

	public function ToDBObjectSetProvider()
	{
		return [
			'lnkContactToFunctionalCI' => [
				'sHostClass'      => 'ApplicationSolution',
				'sAttCode'        => 'contacts_list',
				'sOriginalFilter' => 'SELECT `lnkContactToFunctionalCI` FROM lnkContactToFunctionalCI AS `lnkContactToFunctionalCI` JOIN FunctionalCI AS `FunctionalCI` ON `lnkContactToFunctionalCI`.functionalci_id = `FunctionalCI`.id WHERE (`FunctionalCI`.`id` = :id)',
				'bShowObsolete'   => false,
				'sExpectedFilter' => 'SELECT `Link`, `Remote` FROM lnkContactToFunctionalCI AS `Link` JOIN FunctionalCI AS `FunctionalCI` ON `Link`.functionalci_id = `FunctionalCI`.id JOIN Contact AS `Remote` ON `Link`.contact_id = `Remote`.id WHERE ((`FunctionalCI`.`id` = :id) AND (`Remote`.`obsolescence_flag` = 0))',
			],
			'lnkContactToTicket'       => [
				'sHostClass'      => 'Ticket',
				'sAttCode'        => 'contacts_list',
				'sOriginalFilter' => 'SELECT `lnkContactToTicket` FROM lnkContactToTicket AS `lnkContactToTicket` JOIN Ticket AS `Ticket` ON `lnkContactToTicket`.ticket_id = `Ticket`.id JOIN Contact AS `Contact1` ON `lnkContactToTicket`.contact_id = `Contact1`.id WHERE (`Ticket`.`id` = :id)',
				'bShowObsolete'   => false,
				'sExpectedFilter' => 'SELECT `Link`, `Remote` FROM lnkContactToTicket AS `Link` JOIN Ticket AS `Ticket` ON `Link`.ticket_id = `Ticket`.id JOIN Contact AS `Remote` ON `Link`.contact_id = `Remote`.id WHERE ((`Ticket`.`id` = :id) AND (`Remote`.`obsolescence_flag` = 0))',
			],
		];
	}

}
