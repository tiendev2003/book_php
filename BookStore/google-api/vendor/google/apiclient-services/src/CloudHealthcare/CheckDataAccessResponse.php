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

namespace Google\Service\CloudHealthcare;

class CheckDataAccessResponse extends \Google\Model
{
  /**
   * @var ConsentEvaluation[]
   */
  public $consentDetails;
  protected $consentDetailsType = ConsentEvaluation::class;
  protected $consentDetailsDataType = 'map';
  /**
   * @var bool
   */
  public $consented;

  /**
   * @param ConsentEvaluation[]
   */
  public function setConsentDetails($consentDetails)
  {
    $this->consentDetails = $consentDetails;
  }
  /**
   * @return ConsentEvaluation[]
   */
  public function getConsentDetails()
  {
    return $this->consentDetails;
  }
  /**
   * @param bool
   */
  public function setConsented($consented)
  {
    $this->consented = $consented;
  }
  /**
   * @return bool
   */
  public function getConsented()
  {
    return $this->consented;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CheckDataAccessResponse::class, 'Google_Service_CloudHealthcare_CheckDataAccessResponse');
