<?php

namespace Sm\DatatablesFormBundle\Tests;

use Sm\DatatablesFormBundle\Entity\DataTablesColumnForm;
use Sm\DatatablesFormBundle\Entity\DataTablesForm;
use Sm\DatatablesFormBundle\Entity\DataTablesOrderForm;
use Sm\DatatablesFormBundle\Entity\DataTablesSearchForm;
use Sm\DatatablesFormBundle\Form\Type\DataTablesFormType;
use Symfony\Component\Form\Test\TypeTestCase;

/**
 * Test the form type with DataTables ajax request data.
 *
 * @author Thomas Rudolph <rudolph@secamedia.de>
 * @since 1.0
 */
class DataTablesFormTypeTest extends TypeTestCase
{
    /**
     * Perform the test.
     */
    public function testFormType()
    {
        $formData = [
            'draw' => '123',
            'length' => '10',
            'start' => '5',
            'search' => [
                'regex' => 'false',
                'value' => 'asd'
            ],
            'columns' => [
                '0' => [
                    'data' => 'foo',
                    'name' => 'bar',
                    'searchable' => 'true',
                    'orderable' => 'true',
                    'search' => [
                        'value' => '',
                        'regex' => 'false'
                    ]
                ],
                '1' => [
                    'data' => 'foo2',
                    'name' => 'bar2',
                    'searchable' => 'true',
                    'orderable' => 'false',
                    'search' => [
                        'value' => '/filter/',
                        'regex' => 'true'
                    ]
                ]
            ],
            'order' => [
                '0' => [
                    'column' => '0',
                    'dir' => 'asc'
                ],
                '1' => [
                    'column' => '1',
                    'dir' => 'desc'
                ]
            ]
        ];
        $formObject = new DataTablesForm();

        $form = $this->factory->create(DataTablesFormType::class, $formObject);
        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($formData['draw'], $formObject->getDraw());
        $this->assertEquals($formData['length'], $formObject->getLength());
        $this->assertEquals($formData['start'], $formObject->getStart());
        $this->assertInstanceOf(DataTablesSearchForm::class, $formObject->getSearch());
        $this->assertFalse($formObject->getSearch()->isRegex());
        $this->assertEquals($formData['search']['value'], $formObject->getSearch()->getValue());
        $columns = $formObject->getColumns();
        $this->assertTrue(is_array($columns));
        $this->assertCount(2, $columns);
        $this->assertInstanceOf(DataTablesColumnForm::class, $columns[0]);
        $this->assertInstanceOf(DataTablesColumnForm::class, $columns[1]);
        $this->assertEquals($formData['columns'][0]['data'], $columns[0]->getData());
        $this->assertEquals($formData['columns'][1]['data'], $columns[1]->getData());
        $this->assertEquals($formData['columns'][0]['name'], $columns[0]->getName());
        $this->assertEquals($formData['columns'][1]['name'], $columns[1]->getName());
        $this->assertTrue($columns[0]->isSearchable());
        $this->assertTrue($columns[1]->isSearchable());
        $this->assertTrue($columns[0]->isOrderable());
        $this->assertFalse($columns[1]->isOrderable());
        $this->assertInstanceOf(DataTablesSearchForm::class, $columns[0]->getSearch());
        $this->assertInstanceOf(DataTablesSearchForm::class, $columns[1]->getSearch());
        $this->assertFalse($columns[0]->getSearch()->isRegex());
        $this->assertTrue($columns[1]->getSearch()->isRegex());
        $this->assertNull($columns[0]->getSearch()->getValue());
        $this->assertEquals($formData['columns'][1]['search']['value'], $columns[1]->getSearch()->getValue());
        $order = $formObject->getOrder();
        $this->assertTrue(is_array($order));
        $this->assertCount(2, $order);
        $this->assertInstanceOf(DataTablesOrderForm::class, $order[0]);
        $this->assertInstanceOf(DataTablesOrderForm::class, $order[1]);
        $this->assertEquals($formData['order'][0]['column'], $order[0]->getColumn());
        $this->assertEquals($formData['order'][1]['column'], $order[1]->getColumn());
        $this->assertEquals($formData['order'][0]['dir'], $order[0]->getDir());
        $this->assertEquals($formData['order'][1]['dir'], $order[1]->getDir());
    }
}
