<?php
/**
 * File containing the ezcGraphVector class
 *
 * @package Graph
 * @version //autogentag//
 * @copyright Copyright (C) 2005-2007 eZ systems as. All rights reserved.
 * @license http://ez.no/licenses/new_bsd New BSD License
 * @access private
 */
/**
 * Represents two dimensional vectors
 *
 * @package Graph
 * @access private
 */
class ezcGraphVector extends ezcGraphCoordinate
{
    /**
     * Rotates vector to the left by 90 degrees
     * 
     * @return void
     */
    public function toLeft()
    {
        $tmp = $this->x;
        $this->x = -$this->y;
        $this->y = $tmp;
    }

    /**
     * Rotates vector to the right by 90 degrees
     * 
     * @return void
     */
    public function toRight()
    {
        $tmp = $this->x;
        $this->x = $this->y;
        $this->y = -$tmp;
    }
    
    /**
     * Unifies vector length to 1
     * 
     * @return void
     */
    public function unify()
    {
        $length = $this->length();
        if ( $length == 0 )
        {
            return false;
        }

        $this->x /= $length;
        $this->y /= $length;
    }

    /**
     * Returns length of vector
     * 
     * @return float
     */
    public function length()
    {
        return sqrt(
            pow( $this->x, 2 ) +
            pow( $this->y, 2 )
        );
    }

    /**
     * Multiplies vector with a scalar
     * 
     * @param float $value 
     * @return void
     */
    public function scalar( $value )
    {
        $this->x *= $value;
        $this->y *= $value;
    }

    /**
     * Calculates scalar product of two vectors
     * 
     * @param ezcGraphCoordinate $vector 
     * @return void
     */
    public function mul( ezcGraphCoordinate $vector )
    {
        return $this->x * $vector->x + $this->y * $vector->y;
    }

    /**
     * Adds a vector to another vector
     * 
     * @param ezcGraphCoordinate $vector 
     * @return void
     */
    public function add( ezcGraphCoordinate $vector )
    {
        $this->x += $vector->x;
        $this->y += $vector->y;
    }

    /**
     * Subtracts a vector from another vector
     * 
     * @param ezcGraphCoordinate $vector 
     * @return void
     */
    public function sub( ezcGraphCoordinate $vector )
    {
        $this->x -= $vector->x;
        $this->y -= $vector->y;
    }

    /**
     * Creates a vector from a coordinate object
     * 
     * @param ezcGraphCoordinate $coordinate 
     * @return ezcGraphVector
     */
    public static function fromCoordinate( ezcGraphCoordinate $coordinate )
    {
        return new ezcGraphVector( $coordinate->x, $coordinate->y );
    }
}

?>