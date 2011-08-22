<?php

/**
 *
 * @author Isidro Merayo
 */
class PointOfSaleTest extends PHPUnit_Framework_TestCase {
    
    /**
     * @test
     */
    public function onBarcode_search_catalog() {
        $barcode = '123';
        
        $catalog = Phake::mock('Catalog');
        $screen = Phake::mock('Screen');
        
        $pointOfSale = new PointOfSale($catalog, $screen);
        $pointOfSale->onBarcode('123');
        
        Phake::verify($catalog)->search($barcode);
    }
    
    /**
     * @test
     */
    public function onBarcode_show_price() {
        $barcode = '123';
        
        $screen = Phake::mock('Screen');
        $catalog = Phake::mock('Catalog');
        
        Phake::When($catalog)->search($barcode)->thenReturn('1€');
        
        $pointOfSale = new PointOfSale($catalog , $screen);
        $pointOfSale->onBarcode('123');
        
        Phake::verify($screen)->show('1€');
    }
}
