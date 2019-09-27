<?php

namespace FondOfSpryker\Zed\ProductPageSearchAttributes\Communication\Plugin\PageMapExpander;

use FondOfSpryker\Shared\ProductPageSearchAttributes\ProductPageSearchAttributesConstants;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductPageSearch\Dependency\Plugin\ProductPageMapExpanderInterface;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface;

class AttributesPageMapExpanderPlugin extends AbstractPlugin implements ProductPageMapExpanderInterface
{
    /**
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param array $productData
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Generated\Shared\Transfer\PageMapTransfer
     */
    public function expandProductPageMap(PageMapTransfer $pageMapTransfer, PageMapBuilderInterface $pageMapBuilder, array $productData, LocaleTransfer $localeTransfer): PageMapTransfer
    {
        if (!array_key_exists(ProductPageSearchAttributesConstants::ATTRIBUTES, $productData)) {
            return $pageMapTransfer;
        }

        $pageMapBuilder->addSearchResultData(
            $pageMapTransfer,
            ProductPageSearchAttributesConstants::ATTRIBUTES,
            $productData[ProductPageSearchAttributesConstants::ATTRIBUTES]
        );

        return $pageMapTransfer;
    }
}
