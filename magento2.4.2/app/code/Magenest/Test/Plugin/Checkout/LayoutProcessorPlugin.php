<?php
namespace Magenest\Test\Plugin\Checkout;


class LayoutProcessorPlugin
{

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $checkoutSession;

    /**
     * @var \Magento\Customer\Model\AddressFactory
     */
    protected $customerAddressFactory;

    /**
     * @var \Magento\Framework\Data\Form\FormKey
     */
    protected $formKey;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\CheckoutAgreements\Model\ResourceModel\Agreement\CollectionFactory $agreementCollectionFactory,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Customer\Model\AddressFactory $customerAddressFactory
    ) {
        $this->scopeConfig = $context->getScopeConfig();
        $this->checkoutSession = $checkoutSession;
        $this->customerAddressFactory = $customerAddressFactory;
    }
    /**
     * @param \Magento\Checkout\Block\Checkout\LayoutProcessor $subject
     * @param array $jsLayout
     * @return array
     */
    public function afterProcess(
        \Magento\Checkout\Block\Checkout\LayoutProcessor $subject,
        array  $jsLayout
    ) {
        $customAttributeCode = 'region_address';
        $customField = [
            'component' => 'Magento_Ui/js/form/element/select',
            'config' => [
                'customScope' => 'shippingAddress',
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/select',
                'id' => 'drop-down',
            ],
            'dataScope' => 'shippingAddress.region_address',
            'label' => 'Region',
            'provider' => 'checkoutProvider',
            'visible' => true,
            'validation' => ['required-entry' => true],
            'sortOrder' => 150,
            'id' => 'drop-down',
            'options' => [
                [
                    'value' => 'mb',
                    'label' => 'Miền Bắc',
                ],
                [
                    'value' => 'mn',
                    'label' => 'Miền Nam',
                ],
                [
                    'value' => 'mt',
                    'label' => 'Miền Trung',
                ]
            ]
        ];

        $jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']
        ['payment']['children']['payments-list']['children']['before-place-order']['children']['comment'] = [
            'component' => 'Magento_Ui/js/form/element/textarea',
            'config' => [
                'customScope' => 'shippingAddress',
                'template' => 'ui/form/field',
                'options' => [],
                'id' => 'comment'
            ],
            'dataScope' => 'ordercomment.comment',
            'label' => 'Order Comment',
            'provider' => 'checkoutProvider',
            'visible' => true,
            'sortOrder' => 250,
            'id' => 'comment'
        ];

        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['shipping-address-fieldset']['children'][$customAttributeCode] = $customField;
        return $jsLayout;
    }
}
