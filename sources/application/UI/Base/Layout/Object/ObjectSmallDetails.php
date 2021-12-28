<?php 
namespace Combodo\iTop\Application\UI\Base\Layout\Object;


use cmdbAbstractObject;
use Combodo\iTop\Application\UI\Base\Component\Panel\Panel;
use Combodo\iTop\Application\UI\Base\UIBlock;
use Combodo\iTop\Application\UI\Helper\UIHelper;
use DBObject;
use Dict;
use iKeyboardShortcut;
use MetaModel;

/**
* Class ObjectSmallDetails
*
* @package Combodo\iTop\Application\UI\Base\Layout\Object
* @since 3.0.0
*/
class ObjectSmallDetails extends UIBlock
{
    // Overloaded constants
	/**
	 * @inheritDoc
	 */
	public const BLOCK_CODE = 'ibo-object-small-details';
	/**
	 * @inheritDoc
	 */
	public const DEFAULT_HTML_TEMPLATE_REL_PATH = 'base/layouts/object/object-small-details/layout';

	/** @var string ID of the object */
	protected $sClassName;	
	/** @var string ID of the object */
	protected $sObjectId;
	protected $oObject;
	/** @var string */
	protected $sObjectName;

	/** @var string */
	protected $sObjectIcon;
	protected $sObjectFriendlyName;
	protected $aObjectDisplayValues;
	protected $sStatusLabel;
	protected $sStatusColor;
	/**
	 * @var float|int|mixed|\ormLinkSet|string|null
	 */
	private $sStatusCode;

	public function __construct(DBObject $oObject, ?string $sId = null)
	{
		parent::__construct($sId);		
		$this->sClassName = get_class($oObject);
		$this->sObjectId = $oObject->GetKey();
		$this->oObject = $oObject;
		$this->sObjectIcon = '';
		
		$this->sObjectFriendlyName = $oObject->Get('friendlyname');
		$this->ComputeDetails();
		$this->ComputeObjectIcon();
		$this->ComputeState();
	}
	
	public function ComputeDetails(){
		$sClass = $this->sClassName;
		
		$sStateAttCode = MetaModel::GetStateAttributeCode($sClass);
		$aDetailsList = MetaModel::GetZListItems($sClass, 'small_details');
		$aFieldsMap = [];
		foreach ($aDetailsList as $sAttCode) {
			$oAttDef = MetaModel::GetAttributeDef($sClass, $sAttCode);
			$sAttLabel = MetaModel::GetLabel($sClass, $sAttCode);
			$aFieldsMap[$sAttLabel] = $this->oObject->GetAsHTML($sAttCode);
		}
		$this->aObjectDisplayValues = $aFieldsMap;
	}
	public function ComputeObjectIcon(){
		if($this->oObject->HasInstanceIcon()){
			$this->sObjectIcon = $this->oObject->GetIcon(false);
		}
	}
	
	public function GetDisplayValues() {
		return $this->aObjectDisplayValues;
	}
	public function GetObjectFriendlyName() {
		return $this->sObjectFriendlyName;
	}
	public function GetObjectIcon() {
		return $this->sObjectIcon;
	}
	/**
	 * @see self::$sStatusLabel
	 * @return string
	 */
	public function GetStatusLabel(): ?string
	{
		return $this->sStatusLabel;
	}

	/**
	 * @see self::$sStatusColor
	 * @return string
	 */
	public function GetStatusColor(): string
	{
		return $this->sStatusColor;
	}
	public function GetStatusCode(): string
	{
		return $this->sStatusCode;
	}
	protected function ComputeState(): void
	{
		if (MetaModel::HasStateAttributeCode($this->sClassName)) {
			$this->sStatusCode = $this->oObject->GetState();
			$this->sStatusLabel = $this->oObject->GetStateLabel();

			$oStyle = MetaModel::GetEnumStyle($this->sClassName, MetaModel::GetStateAttributeCode($this->sClassName), $this->sStatusCode);
			if ($oStyle !== null) {
				$this->sStatusColor = $oStyle->GetMainColor();
			}
			// If no style defined, fallback on a default color
			else {
				$sColorName = UIHelper::GetColorNameFromStatusCode($this->sStatusCode);
				$this->sStatusColor = "var(--ibo-lifecycle-$sColorName-state-primary-color)";
			}
		}
	}
}