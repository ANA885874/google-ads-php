<?php
/*
 * Copyright 2018 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Ads\GoogleAds\Lib;

use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\Middleware\FixedHeaderMiddleware;

/**
 * Overrides methods in `GapicClientTrait` to support providing developer
 * tokens for each service client.
 */
trait GoogleAdsGapicClientTrait
{
    private static $DEVELOPER_TOKEN_KEY = 'developer-token';
    private static $LOGIN_CUSTOMER_ID = 'login-customer-id';

    private $developerToken = null;
    private $loginCustomerId = null;

    /**
     * @see GapicClientTrait::modifyClientOptions()
     */
    protected function modifyClientOptions(array &$options)
    {
        if (isset($options[self::$DEVELOPER_TOKEN_KEY])) {
            $this->developerToken = $options[self::$DEVELOPER_TOKEN_KEY];
        }
        if (isset($options[self::$LOGIN_CUSTOMER_ID])) {
            $this->loginCustomerId = $options[self::$LOGIN_CUSTOMER_ID];
        }
    }

    /**
     * @see GapicClientTrait::modifyUnaryCallable()
     */
    protected function modifyUnaryCallable(callable &$callable)
    {
        if (!is_null($this->developerToken)) {
            $headers = [self::$DEVELOPER_TOKEN_KEY => [$this->developerToken]];

            if (!is_null($this->loginCustomerId)) {
                $headers[self::$LOGIN_CUSTOMER_ID] = [$this->loginCustomerId];
            }

            $callable = new FixedHeaderMiddleware($callable, $headers);
        }
        $callable = new GoogleAdsExceptionMiddleware($callable);
        $callable = new GoogleAdsResponseMetadataCallable($callable);
    }
}
