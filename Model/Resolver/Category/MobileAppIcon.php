<?php
/*
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2022 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */
declare(strict_types=1);

namespace Tigren\CatalogCategoryGraphQl\Model\Resolver\Category;

use Magento\Catalog\Model\Category;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\UrlInterface;

/**
 * Class MobileAppIcon
 * @package Tigren\CatalogCategoryGraphQl\Model\Resolver\Category
 */
class MobileAppIcon implements ResolverInterface
{
    /**
     * @var UrlInterface
     */
    protected $_urlInterface;

    /**
     * @param UrlInterface $urlInterface
     */
    public function __construct(
        UrlInterface $urlInterface
    )
    {
        $this->_urlInterface = $urlInterface;
    }

    /**
     * @inheritdoc
     */
    public function resolve(
        Field       $field,
                    $context,
        ResolveInfo $info,
        array       $value = null,
        array       $args = null
    )
    {
        if (empty($value['model'])) {
            return null;
        }

        /** @var Category $category */
        $category = $value['model'];
        if ($field->getName() == 'mobile_app_icon' && $category->getMobileAppIcon()) {
            return $this->_urlInterface->getBaseUrl() . substr($category->getMobileAppIcon(), 1);
        }
    }
}
