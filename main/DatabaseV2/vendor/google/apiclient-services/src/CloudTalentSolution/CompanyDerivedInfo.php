<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\CloudTalentSolution;

class CompanyDerivedInfo extends \Google\Model
{
  protected $headquartersLocationType = Location::class;
  protected $headquartersLocationDataType = '';
  public $headquartersLocation;

  /**
   * @param Location
   */
  public function setHeadquartersLocation(Location $headquartersLocation)
  {
    $this->headquartersLocation = $headquartersLocation;
  }
  /**
   * @return Location
   */
  public function getHeadquartersLocation()
  {
    return $this->headquartersLocation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CompanyDerivedInfo::class, 'Google_Service_CloudTalentSolution_CompanyDerivedInfo');
