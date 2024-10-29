<?php namespace BDroppy\Services\Config;

class CatalogConfig extends baseConfig {
    protected $base = 'catalog';


    public function set($name, $value = false)
    {
        if(is_array($name))
        {
            $name['add-image-url-tools']    = isset($name['add-image-url-tools']);
            $name['import-brand-to-title']  = isset($name['import-brand-to-title']);
            $name['import-color-to-title']  = isset($name['import-color-to-title']);
            $name['publish-product']        = isset($name['publish-product']);
            $name['update-prices']          = isset($name['update-prices']);
            $name['import-retail']          = isset($name['import-retail']);
            $name['delete-products']        = isset($name['delete-products']);
        }

        return parent::set($name, $value); // TODO: Change the autogenerated stub
    }


    public function getAttribute($name,$defaultValue = false)
    {
        return parent::get($name . "-attr",$defaultValue);
    }

    public function getCategoryStructure()
    {
        $structure = $this->get('category-structure',0);
        switch ($structure)
        {
            case 2:
                return [
                    ['gender','category','subcategory'],
                    ['category','subcategory']
                ];
            case 1:
                return [['gender','category','subcategory']];
            default :
                return [['category','subcategory']];
        }
    }

}