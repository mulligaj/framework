<?php
/*
 * HUBzero CMS
 *
 * Copyright 2005-2015 HUBzero Foundation, LLC.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * HUBzero is a registered trademark of Purdue University.
 *
 * @package   hubzero-cms
 * @copyright Copyright 2005-2015 HUBzero Foundation, LLC.
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace Hubzero\Content\Migration\Helpers;

use Hubzero\Utility\Arr;

class QueryDropColumnStatement
{

	protected $_asString, $_name;

	/**
	 * Constructs QueryDropColumnStatement instance
	 *
	 * @param    array   $args   Instantiation state
	 * @return   void
	 */
	public function __construct($args = [])
	{
		$this->_name = $args['name'];
		$this->_asString = '';
	}

	/**
	 * Returns string representation of drop column statement
	 *
	 * @return   string
	 */
	public function toString()
	{
		$this->_generateBaseString();
		$this->_addName();

		return $this->_asString;
	}

	/**
	 * Generates base SQL string statement
	 *
	 * @return   void
	 */
	protected function _generateBaseString()
	{
		$this->_asString = 'DROP COLUMN';
	}

	/**
	 * Adds column name to SQL string statement
	 *
	 * @return   void
	 */
	protected function _addName()
	{
		$this->_asString .= " $this->_name";
	}

}
