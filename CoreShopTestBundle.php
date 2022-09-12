<?php

declare(strict_types=1);

/*
 * CoreShop
 *
 * This source file is available under two different licenses:
 *  - GNU General Public License version 3 (GPLv3)
 *  - CoreShop Commercial License (CCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) CoreShop GmbH (https://www.coreshop.org)
 * @license    https://www.coreshop.org/license     GPLv3 and CCL
 *
 */

namespace CoreShop\Bundle\TestBundle;

use Composer\InstalledVersions;
use CoreShop\Bundle\CoreBundle\Application\Version;
use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class CoreShopTestBundle extends AbstractPimcoreBundle
{
    public function getNiceName(): string
    {
        return 'CoreShop - Test';
    }

    public function getDescription(): string
    {
        return 'CoreShop - Test Bundle';
    }

    public function getVersion(): string
    {
        $bundleName = 'coreshop/test-bundle';

        if (class_exists(InstalledVersions::class)) {
            if (InstalledVersions::isInstalled('coreshop/core-shop')) {
                return InstalledVersions::getVersion('coreshop/core-shop');
            }

            if (InstalledVersions::isInstalled($bundleName)) {
                return InstalledVersions::getVersion($bundleName);
            }
        }

        if (class_exists(Version::class)) {
            return Version::getVersion();
        }

        return '';
    }

    public function getJsPaths(): array
    {
        return [
            '/bundles/coreshoptest/pimcore/js/plugin.js',
            '/bundles/coreshoptest/pimcore/js/xpath.js',
        ];
    }
}
