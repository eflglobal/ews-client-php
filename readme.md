# EFL Web Services PHP Client

Please, read this instruction to try this project.
ApplicantJourneyExample.php and ScoresExample.php are executable files that can show you how developers can interact with this project.

## How to use

ApplicantJourneyController and ScoresController classes provide simple access to ApplicantJourney and Scores API's.
In order to use them you need to include corresponding file in your document and then call an instance of ApplicantJourneyController or ScoresController class.
Pay attention that both classes take place in EFLGlobal\EWSPHPClient namespace.

Class exemplar demands four arguments:
+ URL;
+ path to identifier file;
+ path to decryption key file;
+ path to encryption key file.

After that you can call methods to work with API.
Ever endpoint of API is represented by method called like callEndpointName. For example for login you should use callLogin.
It is strongly recommended to call callLogin method before others as it creates keys needed to get access to other endpoints.
As a general rule, calling every method except callLogin you must provide array with data you want to send. In some cases if data wasn't provided it can be set automatically (check description of methods).

As a result you will get pure JSON from API endpoint. Also instance will receive several properties you can access directly through getters. FFor more information check method description.
You can also overwrite provided to class constructor arguments by getters.


## EWSPMain class 


This class provides methods you can use with both child-classes.
This is an abstract class.

### Public Methods


#### setIdentifier ($identifier)
Sets new path to identifier file. Needs one argument.


#### setDecryptionKey ($decryptionKey)
Sets new path to decryption key file. Needs one argument.

#### setEncryptionKey ($encryptionKey)
Sets new path to encryption key file. Needs one argument.

#### setURL ($url)
Sets new URL. Needs one argument.

#### getIdentifier ()
Returns path to identifier file. Needs no arguments.

#### getDecryptionKey ()
Returns path to decryption key file. Needs no arguments.

#### getEncryptionKey ()
Returns path to encryption key file. Needs no arguments.

#### getURL ()
Returns URL. Needs no arguments.

#### callLogin()
Connects to login endpoint of both API.
Method also calls protected method encoderDecoder which process received tokens and stores them into the instance.
Needs no arguments.


## ApplicantJourneyController class

Following methods were tested and now workable:

#### callStartSession($data)
Method connects to startSession endpoint and returns JSON answer. It also stores uid, public key, application hash in class instance and set sequence to 0.
As an argument takes a PHP array of data to send on server. Method can take stored application hash if one provided.
Pay attention, that before calling this session you should call to login endpoint ot get reqToken.

#### callFinishSession([$data])
Method connects to finishSession endpoint and returns JSON answer.
It may take a PHP array of data to send on server. If not provided, data is taken from stored $uid and $sequence variables.
Pay attention, that before calling this session you should call to login endpoint ot get new reqToken.

#### callPrefetchApplications($data)
Method connects to prefetchApplications endpoint and returns JSON answer.
As an argument takes a PHP array of data to send on server.

#### callResumeSession($data)
Method connects to resumeSession endpoint and returns JSON answer. It also stores uid and public key in class instance.
As an argument takes a PHP array of data to send on server. If not provided, uid is taken from stored $uid variables.

#### callGetApplication($data)
Method connects to getApplication endpoint and returns JSON answer. It also stores application hash in class instance.
As an argument takes a PHP array of data to send on server. If not provided, application hash and uid are taken from stored variables.

#### callFinishStep($data)
Method connects to finishStep endpoint and returns JSON answer.
As an argument takes a PHP array of data to send on server. If not provided, sequence and uid are taken from stored variables.

#### callCreateAttachment($data)
Method connects to createAttachment endpoint and returns JSON answer. It also stores attachment uid in class instance.
As an argument takes a PHP array of data to send on server. If not provided, uid is taken from stored variables.


## ScoresController class

#### callSubject($subject)
Method connects to subject endpoint and returns JSON answer.
As an argument takes a PHP array representing information about subjects.


## Development features

To test the code you should store keys and identifiers in TestKeys/ApplicantJourney and TestKeys/Scores directories of this project.
From the same directory you can call test of command line feature (paths work if keys stored as described above):

> php -f ApplicantJourneyCMD.php 'https://uat-external.eflglobal.com/api/v2/applicant_journey/' 'TestKeys/ApplicantJourney/identifier.txt' 'TestKeys/ApplicantJourney/decryption.key' 'TestKeys/ApplicantJourney/encryption.key' 'sdkExample'
> php -f ScoresCMD.php 'https://uat-external.eflglobal.com/api/v1/scores/' 'TestKeys/Scores/identifier.txt' 'TestKeys/Scores/decryption.key' 'TestKeys/Scores/encryption.key'
