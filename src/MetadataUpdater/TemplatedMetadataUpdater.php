<?php

/*
 * This file is part of the Safe NFT Metadata Provider package.
 *
 * (c) Marco Lipparini <developer@liarco.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\MetadataUpdater;

use App\Contract\MetadataUpdaterInterface;
use RuntimeException;

/**
 * This metadata updater replaces each metadata key with the values found inside the given JSON template.
 * Any key which is not found in the template is left as it is.
 *
 * Each template value also supports the replacement of the following placeholders:
 * - {TOKEN_ID}
 * - {INT_TOKEN_ID} (a value matching this string exactly will be replaced with the token ID as an integer value)
 * - {ASSET_URI} (please remember that the "image" key is already replaced by default!)
 *
 * Limitations: this updater supports first-level keys only.
 *
 * Template example:
 * {
 *   "name": "My awesome token #{TOKEN_ID}"
 * }
 *
 * @author Marco Lipparini <developer@liarco.net>
 */
final class TemplatedMetadataUpdater implements MetadataUpdaterInterface
{
    /**
     * @var string
     */
    private const TOKEN_ID_PLACEHOLDER = '{TOKEN_ID}';

    /**
     * @var string
     */
    private const INT_TOKEN_ID_PLACEHOLDER = '{INT_TOKEN_ID}';



    /**
     * @param array<string, mixed> $template
     */
    public function __construct(
        private readonly ?array $template,
    ) {
    }


}
