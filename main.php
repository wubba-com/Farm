<?php

error_reporting(E_ALL);

require_once 'Animal.php';
require_once 'Farm.php';

$farm = new Farm();


$an1 = new Animal("cow"); 
$an2 = new Animal("cow");
$an3 = new Animal("cow");
$an4 = new Animal("cow");
$an5 = new Animal("cow");
$an6 = new Animal("cow"); 
$an7 = new Animal("cow"); 
$an8 = new Animal("cow"); 
$an9 = new Animal("cow"); 
$an10 = new Animal("cow");

$ch1 = new Animal("chiken");
$ch2 = new Animal("chiken");
$ch3 = new Animal("chiken");
$ch4 = new Animal("chiken");
$ch6 = new Animal("chiken");
$ch7 = new Animal("chiken");
$ch8 = new Animal("chiken");
$ch9 = new Animal("chiken");

$goat1 = new Animal("goat");
$goat2 = new Animal("goat");
$goat3 = new Animal("goat");
$goat4 = new Animal("goat");
$goat5 = new Animal("goat");



/* Животных которые мы купили */
$animals = [
    $an1, $an2, $an3, $an4, $an5, 
    $an6, $an7, $ch1, $ch2, $ch3, 
    $ch4, $ch6, $goat1, $goat2,
    $goat3, $goat4, $goat5,
];



/* Здесь мы их привезли на ферму и добавляем)) */
foreach ($animals as $animal) {
    if($animal->getTypeAnimal() == 'cow') {
        try {
            $animal->setBringingProductsToOneAnimal(10, 12);
        } catch (Exception $e) {
            die('Значение должно быть число!');
        }
    }
    if ($animal->getTypeAnimal() == 'chiken') {
        try {
            $animal->setBringingProductsToOneAnimal(0, 1);
        } catch (Exception $e) {
            die('Значение должно быть число!');
        }
    }
    if ($animal->getTypeAnimal() == 'goat') {
        try {
            $animal->setBringingProductsToOneAnimal(4, 7);
        } catch (Exception $e) {
            die('Значение должно быть число!');
        }
        
    }
    $farm->addAnimal($animal);
}


echo 'Весь список скота на ферме: <br>';
echo '<pre>';
print_r($farm->getAnimal());
echo '</pre>'; 

echo 'Начался cбор продукции...' . '<br>';

$farm->collectProducts();
echo '<pre>';
print_r($farm->getCollectProduct());
echo '</pre>';

echo 'Закончился cбор продукции...' . '<br>';

echo "Всего продукции на ферме: " . $farm->totalProduct() . '<br>';


<?php
$_POST['email'] = "gmakk@yandex.ru";
$_POST['name'] = "Кирилл";
$_POST['city'] = "Москва";
$_POST['clientID'] = 'IPgfhdfh6786789';
if (empty($_POST)) {
   header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
   exit();
}

require_once $_SERVER['DOCUMENT_ROOT'].'/subscribe/sendsay.php';



require($_SERVER['DOCUMENT_ROOT'].'/api/sendpulse/ApiInterface.php');
require($_SERVER['DOCUMENT_ROOT'].'/api/sendpulse/ApiClient.php');
require($_SERVER['DOCUMENT_ROOT'].'/api/sendpulse/Storage/TokenStorageInterface.php');
require($_SERVER['DOCUMENT_ROOT'].'/api/sendpulse/Storage/FileStorage.php');
require($_SERVER['DOCUMENT_ROOT'].'/api/sendpulse/Storage/SessionStorage.php');
require($_SERVER['DOCUMENT_ROOT'].'/api/sendpulse/Storage/MemcachedStorage.php');
require($_SERVER['DOCUMENT_ROOT'].'/api/sendpulse/Storage/MemcacheStorage.php');

use Sendpulse\RestApi\ApiClient;
use Sendpulse\RestApi\Storage\FileStorage;

define('API_USER_ID', '2263b441a3b5a4ecc05b6478a7364062');
define('API_SECRET', '8675a714cc8a2d98ae4b97c2ba0cc9b0');
define('PATH_TO_ATTACH_FILE', __FILE__);

//echo "<pre> _POST ";print_r($_POST);echo "</pre>";

$email = $_POST['email']; // Электронная почта

$bookIDk = 89253898; // Адресная книга "Popup martines.ru"

$SPApiClient = new ApiClient(API_USER_ID, API_SECRET, new FileStorage());
$email_data = $SPApiClient->getEmailInfo($bookIDk, strtolower($email)); // получаем данные по этому email из sandpulse

$bookIDinfo = $SPApiClient->getBookInfo($bookIDk);
//echo "<pre> getBookInfo ";print_r($bookIDinfo);echo "</pre>";
echo "<pre> email_data ";print_r($email_data);echo "</pre>";


if(isset($email_data->message) && $email_data->message === 'Email not found'){ //если такого адреса нет в адресной книге
	$inbook = 'N';
}else{ //если такой адрес есть в адресной книге
	$inbook = 'Y';
	foreach ($email_data->variables as $k => $v) {
		$arEmailSendpulseProps[$v->name] = $v->value; // каждую переменную с заполненым значением адресной книги переносим в новый массив. Судя по api - sandpulse не выдает пустых переменных у email, а это значит что незаполненные (пустые) поля не попадут в данный массив
	}
	//echo "<pre> arEmailSendpulseProps ";print_r($arEmailSendpulseProps);echo "</pre>";
}
					echo "<pre> _POST ";print_r($_POST);echo "</pre>";
				if($inbook === 'N'){//если адреса нет в книге - добавим его
					//if (empty($_POST['city'])) { 
					//	$_POST['city'] = 'Город неопределен'; // Присваем значение default для того, что бы в будущем можно было его изменить
					//}
//
					//if (empty($_POST['clientID'])) {
					//	$_POST['clientID'] = 'Клиент ID неопределен'; // Присваем значение default для того, что бы в будущем можно было его изменить
					//}

					// Для порядка и удобства переносим данные в новый массив
					$variables['Имя'] = $_POST['name'];
					$emails = array(
					    array(
					        'email' => $email,
					        'variables' => $variables
					    )
					);
					$response_add = $SPApiClient->addEmails($bookIDk, $emails);
					echo "Добавлии почту и имя</br>";
					echo "<pre> response_add ";print_r($response_add);echo "</pre>";
					if ((isset($_POST['clientID']) && strlen($_POST['clientID']) > 0) || (isset($_POST['city']) && strlen($_POST['city']) > 0)) {
						sleep(8);
						if(isset($_POST['clientID']) && strlen($_POST['clientID']) > 0){
							$updateVariables['clientID'] = $_POST['clientID'];
						}else{
							$updateVariables['clientID'] = 'не определен по неизвестным причинам';
							$response['description'] = "CID пуст по неизвестным причинам";
						}
						if(isset($_POST['city']) && strlen($_POST['city']) > 0){
							$updateVariables['Город'] = $_POST['city'];
						}else{
							$response['description'] = "Город пуст по неизвестным причинам";
						}
						echo "bookIDk =  ".$bookIDinfo[0]->id."</br>";
						echo "email =  ".$email."</br>";
						echo "<pre> updateVariables ";print_r($updateVariables);echo "</pre>";
						$response_upd = $SPApiClient->updateEmailVariables($bookIDinfo[0]->id, $email, $updateVariables);
						echo "<pre> response_upd ";print_r($response_upd);echo "</pre>";
						echo "===============================================</br>";
					}else{
						$response['description'] = "Город или CID пусты";
					}
					if($response_upd){
						$response['update'] = true; // Если получилось
						$response['status'] = 0;
						$response['text'] = $email;
					}else{
						$response['uupdate'] = false; // Если не получилось добавить
					}
				}else {
						$statusEmail = $email_data->status;
						$statusEmail = 0;
						
						// В зависимости от статуса будет зависеть ответ на клиенте. Про статусы можно прочитать в документации SendPulse в разделе Email сервис -> Получить список email адресов из книги -> Возможный статус имейла
						switch($statusEmail){
							case 1:
								$response['status'] = $statusEmail;
								$response['text'] = 'Вы уже подписаны';
								break;
							case 8:
								$response['status'] = $statusEmail;
								$response['text'] = 'К сожалению мы у вас в спаме';
								break;
							case 9:
								$response['status'] = $statusEmail;
								$response['text'] = 'Пожалуйста проверьте корректность данных';
								break;
							default:
								//echo "<pre> inbook ";print_r($arEmailSendpulseProps);echo "</pre>";
								// если переменная город пуста, то ее у нас не существует, (см строку 46) то мы апдейтим запись. Если не пуста, то ничего не трогаем. оставляем изначальный город

								
								

								// Если одно из значениц не совпадут, то обновляем их все
								if($_POST['city'] !== $arEmailSendpulseProps['Город'] || $_POST['clientID'] !== $arEmailSendpulseProps['clientID']){
									
									// Обновляем поля email 
									$variablesUpdate['Город'] = $_POST['city'];
									$variablesUpdate['clientID'] = $_POST['clientID'];
									$emails = array(
										array(
											'email' => $email,
											'variables' => $variablesUpdate,
										)
									);
									
									// Добавляем в адресную книгу
									$response_update = $SPApiClient->addEmails($bookIDk, $emails);
									if($response_update){ // Если обновление прошло присваеваем ключ со значением true иначе false
										$response['update'] = true;
									}else{
										$response['update'] = false;
									}
								}
								// При любых обстоятельствах составляем ответ!!!
								$response['status'] = $statusEmail;
								$response['text'] = $email;
								break;
							}
					}

//echo "<pre> answer ";print_r($answer);echo "</pre>";

//echo json_encode($answer, JSON_FORCE_OBJECT);

//echo json_encode($response, JSON_UNESCAPED_UNICODE);



if (isset($response)) { //isset($response)
	header("Content-type: application/json; charset=utf-8");
	echo json_encode($response, JSON_UNESCAPED_UNICODE);
} else {
	echo "<pre> email_data ";print_r($email_data);echo "</pre>";
	echo "<pre> arEmailSendpulseProps ";print_r($arEmailSendpulseProps);echo "</pre>";
	//echo "<pre> responseUpdate ";print_r($responseUpdate);echo "</pre>";
}
