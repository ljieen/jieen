<?php




/**
 * A particular physical business or branch of an organization. Examples of
 * LocalBusiness include a restaurant, a particular branch of a restaurant
 * chain, a branch of a bank, a medical practice, a club, a bowling alley, etc.
 *
 * @see https://schema.org/LocalBusiness
 *
 */
class SLSchemaGenerator
{   

    /** @var array */
    private $properties = [];
    private $type;
    private $context;


    /**
     * [_construct Set the Type]
     * @param  [type] $_type [description]
     * @return [type]        [description]
     */
    public function __construct($_type, $context = true) {

        $this->type    = $_type;
        $this->context = $context;
    }

    public function getContext(): string
    {
        return 'https://schema.org';
    }

    public function getType()
    {
        return $this->type;
    }

    public function setProperty(string $property, $value)
    {
        if ($value !== null && $value !== '') {
            $this->properties[$property] = $value;
        }

        return $this;
    }

    public function addProperties(array $properties)
    {
        foreach ($properties as $property => $value) {
            $this->setProperty($property, $value);
        }

        return $this;
    }

    public function if($condition, $callback)
    {
        if ($condition) {
            $callback($this);
        }

        return $this;
    }

    public function getProperty(string $property, $default = null)
    {
        return $this->properties[$property] ?? $default;
    }

    public function getProperties(): array
    {
        return $this->properties;
    }

    /**
     * @return ReferencedType|static
     */
    public function referenced()
    {
        return new ReferencedType($this);
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->properties);
    }

    public function offsetGet($offset)
    {
        return $this->getProperty($offset);
    }

    public function offsetSet($offset, $value)
    {
        $this->setProperty($offset, $value);
    }

    public function offsetUnset($offset)
    {
        unset($this->properties[$offset]);
    }

    public function toArray(): array
    {
        $properties = $this->serializeProperty($this->getProperties());

        $params = [];

        //  when no context for inner nodes
        if($this->context)
             $params['@context'] = $this->getContext();

        $params['@type'] = $this->getType();

        return $params + $properties;
    }

    protected function serializeProperty($property)
    {

        if (is_array($property)) {
            return array_map([$this, 'serializeProperty'], $property);
        }

        //if ($property instanceof Type) {
        if (is_object($property)) {
            $property = $property->toArray();
            unset($property['@context']);
        }

        if ($property instanceof DateTimeInterface) {
            $property = $property->format(DateTime::ATOM);
        }

        if (is_object($property) && method_exists($property, '__toString')) {
            $property = (string) $property;
        }


        if (is_object($property)) {
            throw new Exception("Invalid Type Schema");
        }

        return $property;
    }

    public function toScript(): string
    {
        //return json_encode($this->toArray(), JSON_UNESCAPED_UNICODE);
        return '<script type="application/ld+json">'.json_encode($this->toArray(), JSON_UNESCAPED_UNICODE).'</script>';
        //return '<script type="application/ld+json">'.json_encode($this->toArray(), JSON_UNESCAPED_UNICODE).'</script>';
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function __call(string $method, array $arguments)
    {
        return $this->setProperty($method, $arguments[0] ?? '');
    }

    public function __toString(): string
    {
        return $this->toScript();
    }
}
