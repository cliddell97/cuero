<?php
namespace Vexsoluciones\Checkout\Plugin;

class LayoutProcessorPlugin
{
 
    public function afterProcess(
        \Magento\Checkout\Block\Checkout\LayoutProcessor $subject,
        array  $jsLayout
    ) {
 
        /*$customAttributeCodeDNI = 'dni';

        $customFieldDNI = [
            'component' => 'Magento_Ui/js/form/element/abstract',
            'config' => [
                // customScope is used to group elements within a single form (e.g. they can be validated separately)
                'customScope' => 'shippingAddress.custom_attributes',
                'customEntry' => null,
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/input',
                'tooltip' => [
                    'description' => 'Documento de identidad de quien hace el pedido',
                ],
            ],
            'dataScope' => 'shippingAddress.custom_attributes' . '.' . $customAttributeCodeDNI,
            'label' => 'DNI',
            'provider' => 'checkoutProvider',
            'sortOrder' => 41,
            'validation' => [
               'required-entry' => true
            ],
            'options' => [],
            'filterBy' => null,
            'customEntry' => null,
            'visible' => true,
        ];

        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['shipping-address-fieldset']['children'][$customAttributeCodeDNI] = $customFieldDNI;
*/
        unset($jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['shipping-address-fieldset']['children']['region_id']);
        

        //unset($jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['shipping-address-fieldset']['children']['city']);
        //print_r($jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['shipping-address-fieldset']['children'])


        /*$jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['shipping-address-fieldset']['children']['street'] = [
            'component' => 'Magento_Ui/js/form/components/group',
           // 'label' => __('Street Address'), // I removed main label
          //  'required' => true, //turn false because I removed main label
            'dataScope' => 'shippingAddress.street',
            'provider' => 'checkoutProvider',
            'sortOrder' => 70,
            'type' => 'group',
            'additionalClasses' => 'form-street',
            'children' => [
                [
                    'label' => __('Calle y número'),
                    'placeholder' => 'Ej: Urbanización Villa Fortuna G-30',
                    'additionalClasses' => 'vex-checkout-street',
                    'component' => 'Magento_Ui/js/form/element/abstract',
                    'config' => [
                        'customScope' => 'shippingAddress',
                        'template' => 'ui/form/field',
                        'elementTmpl' => 'ui/form/element/input'
                    ],
                    'dataScope' => '0',
                    'provider' => 'checkoutProvider',
                    'validation' => ['required-entry' => true, "min_text_len‌​gth" => 1, "max_text_length" => 255],
                ],
                [
                    'label' => __('Dept, Ofi'),
                    'placeholder' => 'Ej: Departamento 322',
                    'component' => 'Magento_Ui/js/form/element/abstract',
                    'config' => [
                        'customScope' => 'shippingAddress',
                        'template' => 'ui/form/field',
                        'elementTmpl' => 'ui/form/element/input'
                    ],
                    'dataScope' => '1',
                    'provider' => 'checkoutProvider',
                    'validation' => ['required-entry' => false, "min_text_len‌​gth" => 1, "max_text_length" => 255],
                ],
                [
                    'label' => __('Referencia'),
                    'placeholder' => 'A espaldas del colegio Simón Bolivar',
                    'component' => 'Magento_Ui/js/form/element/abstract',
                    'config' => [
                        'customScope' => 'extensionAttributes',
                        'template' => 'ui/form/field',
                        'elementTmpl' => 'ui/form/element/input'
                    ],
                    'dataScope' => '2',
                    'provider' => 'checkoutProvider',
                    'validation' => ['required-entry' => false, "min_text_len‌​gth" => 1, "max_text_length" => 255],
                ] 
            ]
        ];*/
	//desea factura
      $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
      ['shippingAddress']['children']['shipping-address-fieldset']['children']['factura'] =
      [
        'component' => 'Magento_Ui/js/form/element/abstract',
        'config' =>
        [
          'customScope' => 'shippingAddress.custom_attributes',
          'template' => 'ui/form/field',
          'elementTmpl' => 'ui/form/element/checkbox',
          'options' => [],
          'tooltip' => [
                    'description' => 'Deje vacío si no requiere factura electrónica.',
                ],
  
          'id' => 'factura'
        ],
        'dataScope' => 'shippingAddress.custom_attributes.factura',
	'description' => '¿Desea factura electrónica?',
        'provider' => 'checkoutProvider',
        'visible' => true,
        'checked' => false,
        'validation' => [],
        'sortOrder' => 240,
        'id' => 'factura'
      ];


	//tipo de identificacion
      $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
      ['shippingAddress']['children']['shipping-address-fieldset']['children']['tipo'] =
      [
        'component' => 'Magento_Ui/js/form/element/abstract',
        'config' =>
        [
          'customScope' => 'shippingAddress.custom_attributes',
          'template' => 'ui/form/field',
          'elementTmpl' => 'ui/form/element/checkbox-set',
          'options' => [
		[
			'value' => 'fisica',
			'label' => 'Cédula física',
		],
		[
			'value' => 'juridica',
			'label' => 'Cédula jurídica',
		],
		[
			'value' => 'otro',
			'label' => 'Otro',
		]
	  ],
          'value' => 'fisica'
        ],
        'dataScope' => 'shippingAddress.custom_attributes.tipo',
        'provider' => 'checkoutProvider',
        'visible' => true,
        'validation' => [],
        'sortOrder' => 241,
        'id' => 'tipo'
      ];

	//cedula fisica
      $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
      ['shippingAddress']['children']['shipping-address-fieldset']['children']['fisica'] =
      ['component' => 'Magento_Ui/js/form/element/abstract','config' => 
      [
        'customScope' => 'shippingAddress.custom_attributes',
        'template' => 'ui/form/field',
        'elementTmpl' => 'ui/form/element/input',
        'tooltip' => [
                    'description' => 'Número de 10 dígitos sin guiones ni espacios.',
                ],
     ],
        'dataScope' => 'shippingAddress.custom_attributes.fisica',
        'label' => 'Cédula física',
        'provider' => 'checkoutProvider',
        'visible' => true,
	'validation' => ['required-entry' => true,'validate-number' => true, 'min_text_length' => 9, 'max_text_length' => 10],
        'sortOrder' => 250,
        'id' => 'fisica',
	'placeholder' => 'ej: 111111111',
	'value' => '0000000000' 
      ];

	//cedula juridica
      $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
      ['shippingAddress']['children']['shipping-address-fieldset']['children']['juridica'] =
      [
        'component' => 'Magento_Ui/js/form/element/abstract','config' =>
        [
          'customScope' => 'shippingAddress.custom_attributes',
          'template' => 'ui/form/field',
          'elementTmpl' => 'ui/form/element/input',
          'tooltip' => [
                    'description' => 'Número de 10 dígitos sin guiones ni espacios.',
                ],
        ],
        'dataScope' => 'shippingAddress.custom_attributes.juridica',
        'label' => 'Cédula jurídica',
        'provider' => 'checkoutProvider',
        'visible' => true,
	'validation' => ['required-entry' => true,'validate-number' => true, 'min_text_length' => 10, 'max_text_length' => 11], 
        'sortOrder' => 251,
        'id' => 'juridica',
	'placeholder' => 'ej: 1111111111',
	'value' => '0000000000'
      ];

	//otro documento
      $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
      ['shippingAddress']['children']['shipping-address-fieldset']['children']['otro'] =
      [
        'component' => 'Magento_Ui/js/form/element/abstract','config' =>
        [
          'customScope' => 'shippingAddress.custom_attributes',
          'template' => 'ui/form/field',
          'elementTmpl' => 'ui/form/element/input',
      	'tooltip' => [
                    'description' => 'Ingrese sólo un tipo de identificación.',
                ],
            
        ],
        'dataScope' => 'shippingAddress.custom_attributes.otro',
        'label' => 'Otro documento de identidad',
        'provider' => 'checkoutProvider',
        'visible' => true,
	'validation' => ['required-entry' => true,'validate-alphanum' => true, 'min_text_length' => 5, 'max_text_length' => 15], 
        'sortOrder' => 260,
        'id' => 'otro',
	'value' => '0000000000'
      ];


		$jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['shipping-address-fieldset']['children']['departamento_id']['sortOrder'] = 200;
		$jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['shipping-address-fieldset']['children']['provincia_id']['sortOrder'] = 201;
		$jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['shipping-address-fieldset']['children']['distrito_id']['sortOrder'] = 202;
        return $jsLayout;
    }
}