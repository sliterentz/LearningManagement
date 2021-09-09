<?php

namespace Learning\Management\Plugin\Adminhtml;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\Url;

class LmsActions
{
    protected $urlBuilder;
    protected $context;
    public function __construct(
        ContextInterface $context,
        Url $urlBuilder
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->context = $context;
    }
    public function afterPrepareDataSource($lmsActions, $result)
    {
        if (isset($result['data']['items'])) {
            foreach ($result['data']['items'] as &$item) {
                $item[$lmsActions->getData('title')]['preview'] = [
                    'href' => $this->urlBuilder->getUrl('admin/learning_management/post/edit', ['id' => $item['post_id'], '_nosid' => true]),
                    'target' => '_blank',
                    'label' => __('ُPreview'),
                ];
            }
        }
        return $result;
    }
}
