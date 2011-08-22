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
        $pointOfSale = new PointOfSale($catalog);
        $pointOfSale->onBarcode('123');
        
        Phake::verify($catalog)->search($barcode);
    }
}
