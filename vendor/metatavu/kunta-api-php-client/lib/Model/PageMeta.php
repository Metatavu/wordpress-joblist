<?php
/**
 * PageMeta
 *
 * PHP version 5
 *
 * @category Class
 * @package  KuntaAPI
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Kunta API
 *
 * Solution to combine municipality services under single API.
 *
 * OpenAPI spec version: 0.1.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace KuntaAPI\Model;

use \ArrayAccess;

/**
 * PageMeta Class Doc Comment
 *
 * @category    Class */
/** 
 * @package     KuntaAPI
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class PageMeta implements ArrayAccess
{
    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'PageMeta';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = array(
        'hideMenuChildren' => 'bool',
        'unmappedParentId' => 'string',
        'siteRootPage' => 'bool'
    );

    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = array(
        'hideMenuChildren' => 'hideMenuChildren',
        'unmappedParentId' => 'unmappedParentId',
        'siteRootPage' => 'siteRootPage'
    );

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = array(
        'hideMenuChildren' => 'setHideMenuChildren',
        'unmappedParentId' => 'setUnmappedParentId',
        'siteRootPage' => 'setSiteRootPage'
    );

    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = array(
        'hideMenuChildren' => 'getHideMenuChildren',
        'unmappedParentId' => 'getUnmappedParentId',
        'siteRootPage' => 'getSiteRootPage'
    );

    public static function getters()
    {
        return self::$getters;
    }

    

    

    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = array();

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['hideMenuChildren'] = isset($data['hideMenuChildren']) ? $data['hideMenuChildren'] : null;
        $this->container['unmappedParentId'] = isset($data['unmappedParentId']) ? $data['unmappedParentId'] : null;
        $this->container['siteRootPage'] = isset($data['siteRootPage']) ? $data['siteRootPage'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = array();
        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properteis are valid
     */
    public function valid()
    {
        return true;
    }


    /**
     * Gets hideMenuChildren
     * @return bool
     */
    public function getHideMenuChildren()
    {
        return $this->container['hideMenuChildren'];
    }

    /**
     * Sets hideMenuChildren
     * @param bool $hideMenuChildren
     * @return $this
     */
    public function setHideMenuChildren($hideMenuChildren)
    {
        $this->container['hideMenuChildren'] = $hideMenuChildren;

        return $this;
    }

    /**
     * Gets unmappedParentId
     * @return string
     */
    public function getUnmappedParentId()
    {
        return $this->container['unmappedParentId'];
    }

    /**
     * Sets unmappedParentId
     * @param string $unmappedParentId
     * @return $this
     */
    public function setUnmappedParentId($unmappedParentId)
    {
        $this->container['unmappedParentId'] = $unmappedParentId;

        return $this;
    }

    /**
     * Gets siteRootPage
     * @return bool
     */
    public function getSiteRootPage()
    {
        return $this->container['siteRootPage'];
    }

    /**
     * Sets siteRootPage
     * @param bool $siteRootPage
     * @return $this
     */
    public function setSiteRootPage($siteRootPage)
    {
        $this->container['siteRootPage'] = $siteRootPage;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(\KuntaAPI\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return json_encode(\KuntaAPI\ObjectSerializer::sanitizeForSerialization($this));
    }
}


