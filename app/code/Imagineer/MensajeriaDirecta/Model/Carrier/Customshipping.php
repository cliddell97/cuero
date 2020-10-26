<?php

namespace Imagineer\MensajeriaDirecta\Model\Carrier;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\DataObject;
use Magento\Shipping\Model\Carrier\AbstractCarrier;
use Magento\Shipping\Model\Carrier\CarrierInterface;
use Magento\Shipping\Model\Config;
use Magento\Shipping\Model\Rate\ResultFactory;
use Magento\Store\Model\ScopeInterface;
use Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory;
use Magento\Quote\Model\Quote\Address\RateResult\Method;
use Magento\Quote\Model\Quote\Address\RateResult\MethodFactory;
use Magento\Quote\Model\Quote\Address\RateRequest;
use Psr\Log\LoggerInterface;
 
class Customshipping extends AbstractCarrier implements CarrierInterface
{
    private $cantonesEnGAM = array(
        '101','102','103','106','107','108','109','110','111','113','114','115','118',/*SJ*/
        '201','202','205', /*ALAJUELA*/
        '301','302','303','306','307','308', /*CARTAGO*/
        '401','402','403','404','405','406','407','408','409' /*HEREDIA*/
    );
	
    protected $scopeConfig;
    /**
     
    * Carrier's code
    *
    * @var string
    */
    
    protected $_code = 'mensajeriadirecta';
    /**
    * Whether this carrier has fixed rates calculation
    *
    * @var bool
    */
    
    protected $_isFixed = true;
    /**
    * @var ResultFactory
    */
    
    protected $_rateResultFactory;
    /**
    * @var MethodFactory
    */
    
    protected $_rateMethodFactory;
    /**
    * @param ScopeConfigInterface $scopeConfig
    * @param ErrorFactory $rateErrorFactory
    * @param LoggerInterface $logger
    * @param ResultFactory $rateResultFactory
    * @param MethodFactory $rateMethodFactory
    * @param array $data
    */
 
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        ErrorFactory $rateErrorFactory,
        LoggerInterface $logger,
        ResultFactory $rateResultFactory,
        MethodFactory $rateMethodFactory,
        array $data = []
    ) {
        $this->_rateResultFactory = $rateResultFactory;
        $this->_rateMethodFactory = $rateMethodFactory;
        parent::__construct($scopeConfig, $rateErrorFactory, $logger, $data);
    	$this->scopeConfig = $scopeConfig;
    }
    
    /**
    * Generates list of allowed carrier`s shipping methods
    * Displays on cart price rules page
    *
    * @return array
    * @api
    */
    
    public function getAllowedMethods()
    {
        return [$this->getCarrierCode() => __($this->getConfigData('name'))];
    }

    /**
    * Collect and get rates for storefront
    *
    * @SuppressWarnings(PHPMD.UnusedFormalParameter)
    * @param RateRequest $request
    * @return DataObject|bool|null
    * @api
    */

    public function collectRates(RateRequest $request)
    {

/*        * Make sure that Shipping method is enabled
        */
    	$scope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        if (!$this->isActive()) {
            return false;
        }
		if (!($this->scopeConfig->getValue('carriers/imagineer_mensajeriaDirecta/active',$scope))) {
            return false;
        }
		
		$zip = $request->getDestPostcode();
		$country = $request->getDestCountryId();
		if($country == 'CR'){
		if(in_array(substr($zip, 0, 3), $this->cantonesEnGAM)){
			 /** @var \Magento\Shipping\Model\Rate\Result $result */
			$result = $this->_rateResultFactory->create();
			$shippingRate = $this->scopeConfig->getValue('carriers/imagineer_mensajeriaDirecta/price',$scope);
			$method = $this->_rateMethodFactory->create();
		}else {
			 return false;
		}
		}else {
			return false;
		}
		


        /**
        * Set carrier's method data
        */
        $method->setCarrier($this->getCarrierCode());
        $method->setCarrierTitle($this->scopeConfig->getValue('carriers/imagineer_mensajeriaDirecta/title',$scope));
        /**
        * Displayed as shipping method under Carrier
        */


        $method->setMethod($this->getCarrierCode());
		$method->setMethodTitle($this->scopeConfig->getValue('carriers/imagineer_mensajeriaDirecta/name',$scope));
        $method->setPrice($shippingRate);
        $method->setCost($shippingRate);
        $result->append($method);

        return $result;

    } 

}
