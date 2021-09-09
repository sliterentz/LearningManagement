<?php

namespace Learning\Management\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\Url;

class Actions extends Column
{

    /** @var UrlInterface */
    protected $_urlBuilder;

    /**
     * @var string
     */
    protected $_viewUrl;


    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        Url $urlBuilder,
        $viewUrl = 'edit',
        array $components = [],
        array $data = []
    ) {
        $this->_urlBuilder = $urlBuilder;
        $this->_viewUrl    = $viewUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $name = $this->getData('title');
                if (isset($item['post_id'])) {
                    $item[$name]['view']   = [
                        'href'  => $this->_urlBuilder->getUrl($this->_viewUrl, ['id' => $item['post_id']]),
                        'target' => '_blank',
                        'label' => __('View on Frontend')
                    ];
                }
                $item[$this->getData('name')]['edit'] = [
                    'href' => $this->_urlBuilder->getUrl(
                        'admin/learning_management/post/edit',
                        ['id' => $item['post_id']]
                    ),
                    'label' => __('Edit'),
                    'hidden' => false,
                ];
            }
        }

        return $dataSource;
    }
}
