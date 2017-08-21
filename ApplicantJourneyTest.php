<?php
require_once 'ApplicantJourneyController.php';

$loginRequestApplicantJourney = new EWSPHPClient\ApplicantJourneyController(
    'https://uat-external.eflglobal.com/api/v2/applicant_journey/',
    'TestKeys/ApplicantJourney/identifier.txt',
    'TestKeys/ApplicantJourney/decryption.key',
    'TestKeys/ApplicantJourney/encryption.key');

$data = [
    "applicant"=> [
          "birthday"=>         '11.11.11',
          "email"=>            'test@test.test',
          "employmentStatus"=> 'intern',
          "firstName"=>       'bob',
          "gender"=>           'm',
          "lastName"=>         'dylan',
          "maritalStatus"=>    'single',
          "loan"=>            [
                                "amount"=>         15000,
                                "businessIncome"=> 15000,
                                "currency"=>       'PEN',
                                "personalIncome"=> 12000,
                                "term"=>           2.17
                              ],
          "locale"=>           'en',
          "utcOffset"=>        '2',

          "addresses"=> [
            "business"=> [
                          "city"=>       'asdf',
                          "country"=>    'USA',
                          "latitude"=>   12,
                          "longitude"=>  12,
                          "street"=>     'qwe',
                          "postalCode"=> 'qwe',
                          "region"=>     'qwer'
                         ],
            "home"=>     [
                            "city"=>       'asdf',
                            "country"=>    'USA',
                            "latitude"=>   12,
                            "longitude"=>  12,
                            "street"=>     'qwe',
                            "postalCode"=> 'qwe',
                            "region"=>     'qwer'
                         ],
            "work"=>     [
                            "city"=>       'asdf',
                            "country"=>    'USA',
                            "latitude"=>   12,
                            "longitude"=>  12,
                            "street"=>     'qwe',
                            "postalCode"=> 'qwe',
                            "region"=>     'qwer'
                         ],
          ],

          "connections"=> [
            "facebook"=>   true,
            "google"=>     true,
            "linkedin"=>   true,
            "microsoft"=>  true,
            "twitter"=>    true,
            "yahoo"=>      true
          ],

          "idNumbers"=> [
            "analyticsId"=>        '123',
            "bankAccountNumber"=>  '1234123413414',
            "driversLicense"=>     '1234',
            "externalKey"=>        '12341234',
            "nationalId"=>         '1234123',
            "passport"=>           '12341234134',
            "phoneNumber"=>        '12341234',
            "voterId"=>            '1234124'
          ]
    ],
    "application"=>   "a0d0b349-8e72-11e5-850b-0a2fc0809a2d#1.42"
];
$loginRequestApplicantJourney->callLogin();
$loginRequestApplicantJourney->callStartSession($data);
