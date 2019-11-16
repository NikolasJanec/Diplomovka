<?php


namespace App\Controller\Api;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Process\Process;
use App\Entity\User;
use App\Entity\MobileDevice;
use App\Entity\Log;
use App\Helper\UuidHelper;
use phpseclib\Crypt\RSA;


class MobileDeviceController extends Controller
{
    public function createAction(Request $request){
        $data = json_decode($request->getContent(), true);
        if(!(empty($data))){
            $user = $this->getDoctrine()->getRepository("App:User")->findOneBy([
                'email' => $data['userEmail']
            ]);
            if($user){
                if ($data['userPassword'] == $user->getPassword()){
                    $mobileDevice = new MobileDevice();
                    $mobileDevice->setUuid(UuidHelper::uuid());
                    $mobileDevice->setUser($user);
                    $mobileDevice->fillCreatedAt();
                    $mobileDevice->fillUpdatedAt();

                    $rsa = new RSA();
                    $key = $rsa->createKey();
                    $mobileDevice->setPrivateKey($key['privatekey']);
                    $mobileDevice->setPublicKey($key['publickey']);
                    $mobileDevice->setDescription("mobilne zariadenie");

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($mobileDevice);
                    $em->flush();

                    $log = new Log();
                    $log->setUser($user);
                    $log->setMobileDevice($mobileDevice);
                    $log->fillUpdatedAt();
                    $log->fillCreatedAt();
                    $log->setStatus("Zaregistroval zariadenie");

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($log);
                    $em->flush();

                    $result = [
                        'mobileDeviceUuid' => $mobileDevice->getUuid(),
                        'mobileDevicePrivateKey' => $mobileDevice->getPrivateKey()
                    ];

                    return new JsonResponse($result, Response::HTTP_CREATED);


                }else{
                    return new JsonResponse('Bad login data',Response::HTTP_BAD_REQUEST);
                }

            }else{
                return new JsonResponse('User does not exist',Response::HTTP_BAD_REQUEST);
            }
        }else{
            return new JsonResponse('Bad request',Response::HTTP_BAD_REQUEST);
        }

    }

    public function createGpsAction(Request $request){
        $data = json_decode($request->getContent(), true);
        if(!(empty($data))){
            $mobileDevice = $this->getDoctrine()->getRepository("App:MobileDevice")->findOneBy([
                'uuid' => $data['uuidMobileDevice']
            ]);
            if ($mobileDevice){

                $log = new Log();
                $log->setMobileDevice($mobileDevice);
                $log->setUser($mobileDevice->getUser());
                $log->setGpsLatitude($data['gpsLatitude']);
                $log->setGpsLongitude($data['gpsLongitude']);
                $log->fillUpdatedAt();
                $log->fillCreatedAt();
                $log->setStatus("GPS hodnota");
                $em = $this->getDoctrine()->getManager();
                $em->persist($log);
                $em->flush();

                return new JsonResponse('OK', Response::HTTP_CREATED);

            }else{
                return new JsonResponse('Mobile device is not registered',Response::HTTP_BAD_REQUEST);
            }
        }else{
            return new JsonResponse('Bad request',Response::HTTP_BAD_REQUEST);
        }

    }

}