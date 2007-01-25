<?php
/**
 * ezcGraphVectorTest 
 * 
 * @package Graph
 * @version //autogen//
 * @subpackage Tests
 * @copyright Copyright (C) 2005-2007 eZ systems as. All rights reserved.
 * @license http://ez.no/licenses/new_bsd New BSD License
 */

/**
 * Tests for ezcGraph class.
 * 
 * @package ImageAnalysis
 * @subpackage Tests
 */
class ezcGraphVectorTest extends ezcTestCase
{
	public static function suite()
	{
		return new PHPUnit_Framework_TestSuite( "ezcGraphVectorTest" );
	}

    public function testCreateVector()
    {
        $vector = new ezcGraphVector( 1, 2 );

        $this->assertEquals(
            1,
            $vector->x
        );

        $this->assertEquals(
            2,
            $vector->y
        );
    }

    public function testCreateVectorFromCoordinate()
    {
        $vector = ezcGraphVector::fromCoordinate( new ezcGraphCoordinate( 1, 2 ) );

        $this->assertEquals(
            1,
            $vector->x
        );

        $this->assertEquals(
            2,
            $vector->y
        );
    }

    public function testVectorLength()
    {
        $vector = new ezcGraphVector( 1, 2 );

        $this->assertEquals(
            sqrt( 5 ),
            $vector->length()
        );
    }

    public function testUnifyVector()
    {
        $vector = new ezcGraphVector( 2, 0 );
        $vector->unify();

        $this->assertEquals(
            1,
            $vector->x
        );

        $this->assertEquals(
            0,
            $vector->y
        );
    }

    public function testVectorMultiplyScalar()
    {
        $vector = new ezcGraphVector( 1, 2 );
        $vector->scalar( 2 );

        $this->assertEquals(
            2,
            $vector->x
        );

        $this->assertEquals(
            4,
            $vector->y
        );
    }

    public function testVectorMultiplyCoordinate()
    {
        $vector = new ezcGraphVector( 1, 2 );
        $result = $vector->mul( new ezcGraphCoordinate( 3, 2 ) );

        $this->assertEquals(
            $result,
            7
        );
    }

    public function testVectorMultiplyVector()
    {
        $vector = new ezcGraphVector( 1, 2 );
        $result = $vector->mul( new ezcGraphVector( 3, 2 ) );

        $this->assertEquals(
            $result,
            7
        );
    }

    public function testVectorAddCoordinate()
    {
        $vector = new ezcGraphVector( 1, 2 );
        $vector->add( new ezcGraphCoordinate( 3, 2 ) );

        $this->assertEquals(
            $vector,
            new ezcGraphVector( 4, 4 )
        );
    }

    public function testVectorAddVector()
    {
        $vector = new ezcGraphVector( 1, 2 );
        $vector->add( new ezcGraphVector( 3, 2 ) );

        $this->assertEquals(
            $vector,
            new ezcGraphVector( 4, 4 )
        );
    }

    public function testVectorSubCoordinate()
    {
        $vector = new ezcGraphVector( 1, 2 );
        $vector->sub( new ezcGraphCoordinate( 3, 2 ) );

        $this->assertEquals(
            $vector,
            new ezcGraphVector( -2, 0 )
        );
    }

    public function testVectorSubVector()
    {
        $vector = new ezcGraphVector( 1, 2 );
        $vector->sub( new ezcGraphVector( 3, 2 ) );

        $this->assertEquals(
            $vector,
            new ezcGraphVector( -2, 0 )
        );
    }
}

?>