<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v14/services/conversion_upload_service.proto

namespace Google\Ads\GoogleAds\V14\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A custom variable.
 *
 * Generated from protobuf message <code>google.ads.googleads.v14.services.CustomVariable</code>
 */
class CustomVariable extends \Google\Protobuf\Internal\Message
{
    /**
     * Resource name of the custom variable associated with this conversion.
     * Note: Although this resource name consists of a customer id and a
     * conversion custom variable id, validation will ignore the customer id and
     * use the conversion custom variable id as the sole identifier of the
     * conversion custom variable.
     *
     * Generated from protobuf field <code>string conversion_custom_variable = 1 [(.google.api.resource_reference) = {</code>
     */
    protected $conversion_custom_variable = '';
    /**
     * The value string of this custom variable.
     * The value of the custom variable should not contain private customer data,
     * such as email addresses or phone numbers.
     *
     * Generated from protobuf field <code>string value = 2;</code>
     */
    protected $value = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $conversion_custom_variable
     *           Resource name of the custom variable associated with this conversion.
     *           Note: Although this resource name consists of a customer id and a
     *           conversion custom variable id, validation will ignore the customer id and
     *           use the conversion custom variable id as the sole identifier of the
     *           conversion custom variable.
     *     @type string $value
     *           The value string of this custom variable.
     *           The value of the custom variable should not contain private customer data,
     *           such as email addresses or phone numbers.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V14\Services\ConversionUploadService::initOnce();
        parent::__construct($data);
    }

    /**
     * Resource name of the custom variable associated with this conversion.
     * Note: Although this resource name consists of a customer id and a
     * conversion custom variable id, validation will ignore the customer id and
     * use the conversion custom variable id as the sole identifier of the
     * conversion custom variable.
     *
     * Generated from protobuf field <code>string conversion_custom_variable = 1 [(.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getConversionCustomVariable()
    {
        return $this->conversion_custom_variable;
    }

    /**
     * Resource name of the custom variable associated with this conversion.
     * Note: Although this resource name consists of a customer id and a
     * conversion custom variable id, validation will ignore the customer id and
     * use the conversion custom variable id as the sole identifier of the
     * conversion custom variable.
     *
     * Generated from protobuf field <code>string conversion_custom_variable = 1 [(.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setConversionCustomVariable($var)
    {
        GPBUtil::checkString($var, True);
        $this->conversion_custom_variable = $var;

        return $this;
    }

    /**
     * The value string of this custom variable.
     * The value of the custom variable should not contain private customer data,
     * such as email addresses or phone numbers.
     *
     * Generated from protobuf field <code>string value = 2;</code>
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * The value string of this custom variable.
     * The value of the custom variable should not contain private customer data,
     * such as email addresses or phone numbers.
     *
     * Generated from protobuf field <code>string value = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setValue($var)
    {
        GPBUtil::checkString($var, True);
        $this->value = $var;

        return $this;
    }

}

