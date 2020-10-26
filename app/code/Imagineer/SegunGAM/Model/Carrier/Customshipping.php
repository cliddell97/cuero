<?php

namespace Imagineer\SegunGAM\Model\Carrier;

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
	
//	private $cantonesEnGAM = array(
//        '101','102','103','106','107','108','109','110','111','113','114','115','118',/*SJ*/
//        '201','202','205', /*ALAJUELA*/
//        '301','302','303','306','307','308', /*CARTAGO*/
//        '401','402','403','404','405','406','407','408','409' /*HEREDIA*/
//   );
 
    private $cantonesPermitidos = array(
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
    
    protected $_code = 'segungam';
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
		$writer = new \Zend\Log\Writer\Stream(BP.'/var/log/enviofueraGAM.log');
        	$logger = new \Zend\Log\Logger();
        	$logger->addWriter($writer);
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$cart = $objectManager->get('\Magento\Checkout\Model\Cart'); 
 
		$subTotal = $cart->getQuote()->getSubtotal();
		$grandTotal = $cart->getQuote()->getGrandTotal();

		$logger ->info("subTotal: ".$subTotal);
		$logger ->info("grandTotal: ".$grandTotal);

/*        * Make sure that Shipping method is enabled
        */
		
    	$scope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        if (!$this->isActive()) {
            return false;
        }
		if (!($this->scopeConfig->getValue('carriers/imagineer_segunGAM/active',$scope))) {
            return false;
        }

	
	$country = $request->getDestCountryId();

	$logger ->info("country: ".$country );
        if ($country !='CR'){
            return false;
        }
		$zip = $request->getDestPostcode();
		$country = $request->getDestCountryId();
		if($grandTotal>=40 ){
			if(!in_array(substr($zip, 0, 3), $this->cantonesPermitidos)){
				$logger ->info("codigo postal: ".$zip);
				 /** @var \Magento\Shipping\Model\Rate\Result $result */
				$result = $this->_rateResultFactory->create();
				$shippingRate = $this->scopeConfig->getValue('carriers/imagineer_segunGAM/price_out',$scope);
				$method = $this->_rateMethodFactory->create();
			}else {
				return false;
			}
		}else{
			return false;
		}

        /**
        * Set carrier's method data
        */
        $method->setCarrier($this->getCarrierCode());
        $method->setCarrierTitle($this->scopeConfig->getValue('carriers/imagineer_segunGAM/title',$scope));
        /**
        * Displayed as shipping method under Carrier
        */


        $method->setMethod($this->getCarrierCode());
		$method->setMethodTitle($this->scopeConfig->getValue('carriers/imagineer_segunGAM/name',$scope));
        $method->setPrice($shippingRate);
        $method->setCost($shippingRate);
        $result->append($method);

        return $result;

    } 

}