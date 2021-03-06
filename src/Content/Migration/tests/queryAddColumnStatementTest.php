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

namespace Components\Courses\Tests;

$componentPath = Component::path('com_courses');

require_once "$componentPath/helpers/queryAddColumnStatement.php";

use Hubzero\Test\Basic;
use Components\Courses\Helpers\QueryAddColumnStatement;

class QueryAddColumnStatementTest extends Basic
{

	public function testToStringReturnsCorrectStringWhenNameAndTypeProvided()
	{
		$columnData = ['name' => 'test', 'type' => 'varchar(255)'];
		$addColumnStatement = new QueryAddColumnStatement($columnData);
		$expectedStatement = 'ADD COLUMN test varchar(255)';

		$actualStatement = $addColumnStatement->toString();

		$this->assertEquals($expectedStatement, $actualStatement);
	}

	public function testToStringReturnsCorrectStringWhenRestrictionProvided()
	{
		$columnData = ['name' => 'test', 'type' => 'varchar(255)', 'restriction' => 'NOT NULL'];
		$addColumnStatement = new QueryAddColumnStatement($columnData);
		$expectedStatement = 'ADD COLUMN test varchar(255) NOT NULL';

		$actualStatement = $addColumnStatement->toString();

		$this->assertEquals($expectedStatement, $actualStatement);
	}

	public function testToStringReturnsCorrectStringWhenDefaultProvided()
	{
		$columnData = ['name' => 'test', 'type' => 'varchar(255)', 'default' => "'foo'"];
		$addColumnStatement = new QueryAddColumnStatement($columnData);
		$expectedStatement = "ADD COLUMN test varchar(255) DEFAULT 'foo'";

		$actualStatement = $addColumnStatement->toString();

		$this->assertEquals($expectedStatement, $actualStatement);
	}

	public function testToStringReturnsCorrectStringWhenRestrictionAndDefaultProvided()
	{
		$columnData = [
			'name' => 'test',
			'type' => 'varchar(255)',
			'restriction' => 'NOT NULL',
			'default' => "'foo'"];
		$addColumnStatement = new QueryAddColumnStatement($columnData);
		$expectedStatement = "ADD COLUMN test varchar(255) NOT NULL DEFAULT 'foo'";

		$actualStatement = $addColumnStatement->toString();

		$this->assertEquals($expectedStatement, $actualStatement);
	}

	public function testToStringReturnsCorrectStringWhenRestrictionAndDefaultZero()
	{
		$columnData = [
			'name' => 'test',
			'type' => 'varchar(255)',
			'restriction' => 'NOT NULL',
			'default' => 0];
		$addColumnStatement = new QueryAddColumnStatement($columnData);
		$expectedStatement = "ADD COLUMN test varchar(255) NOT NULL DEFAULT 0";

		$actualStatement = $addColumnStatement->toString();

		$this->assertEquals($expectedStatement, $actualStatement);
	}

}
