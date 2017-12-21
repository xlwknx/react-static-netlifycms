<?php

namespace VirgilSecurity\Models\Src;


abstract class BaseModel
{
    public function __isset($name)
    {
        $method = $this->buildMethodName($name);

        return method_exists($this, $method);
    }


    public function __get($name)
    {
        $method = $this->buildMethodName($name);

        return call_user_func([$this, $method]);
    }


    private function buildMethodName($propName)
    {
        $method = '';
        $parts = explode('_', $propName);

        foreach ($parts as $part) {
            $method .= ucfirst($part);
        }

        return $method;
    }
}
