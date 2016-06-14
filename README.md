DataTables Form Types and Entities for AJAX Request
===================================================

This is a Symfony Bundle to represent the DataTables Ajax Request Data
into an entity via form types.


Installation via Composer
=========================

Install it via composer as a dependency:

`$ php composer.phar require secamedia/datatables-form-bundle`


Activation
==========

Register the bundle in the kernel to activate the bundle.

```php
    public function registerBundles()
    {
        $bundles = [
            ...
            new Sm\DatatablesFormBundle\SmDatatablesFormBundle(),
            ...
        ];
    }
```


How to use with DataTables ajax request
=======================================

To recognize the request data you have to move the datatables data into
the key `datatables`:


```javascript
$('table').DataTable({
    'ajax': {
        'url': '/ajax-request.php',
        'data': function (data) {
            // Move DataTables data into own key
            for (var d in data) {
                if (!data.hasOwnProperty(d)) {
                    continue;
                }
                data['datatables[' + d + ']'] = data[d];
                delete data[d];
            }
        },
        'type': 'POST'
    }
});
```

In your controller you can then create a form and set the entity to
retrieve the data as an object:

```php
use Sm\DatatablesFormBundle\Entity\DataTablesForm;
use Sm\DatatablesFormBundle\Form\Type\DataTablesFormType;
...
    public function someAction(Request $request)
    {
        $data = new DataTablesForm();
        $form = $this->createForm(DataTablesFormType::class, $data);
        $form->handleRequest($request);
        // use $data
    }
...
```
