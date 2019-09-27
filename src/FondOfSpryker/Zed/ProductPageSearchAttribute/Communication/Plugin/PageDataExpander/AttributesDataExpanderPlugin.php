<?php

namespace FondOfSpryker\Zed\ProductPageSearchAttributes\Communication\Plugin\PageDataExpander;

use FondOfSpryker\Shared\ProductPageSearchAttributes\ProductPageSearchAttributesConstants;
use Generated\Shared\Transfer\ProductPageSearchTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductPageSearch\Dependency\Plugin\ProductPageDataExpanderInterface;

class AttributesDataExpanderPlugin extends AbstractPlugin implements ProductPageDataExpanderInterface
{
    public const PLUGIN_NAME = 'AttributesDataExpanderPlugin';

    /**
     * @param array $productData
     * @param \Generated\Shared\Transfer\ProductPageSearchTransfer $productAbstractPageSearchTransfer
     *
     * @return void
     */
    public function expandProductPageData(array $productData, ProductPageSearchTransfer $productAbstractPageSearchTransfer): void
    {
        if (!array_key_exists(ProductPageSearchAttributesConstants::ATTRIBUTES, $productData)) {
            return;
        }

        $attributesData = \json_decode($productData[ProductPageSearchAttributesConstants::ATTRIBUTES], true);

        $productAbstractPageSearchTransfer->setAttributes($attributesData);
    }
}
