<?php

namespace yii2module\dashboard\web\controllers;

use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\View;
use yii2lab\app\domain\helpers\EnvService;
use yii2lab\extension\jwt\entities\AuthenticationEntity;
use yii2lab\extension\jwt\entities\TokenEntity;
use yii2lab\helpers\ClientHelper;
use yii2lab\extension\enum\enums\TimeEnum;
use yii2lab\rest\web\assets\account\AccountAsset;
use yii2lab\rest\web\assets\rest\RestAsset;

class DefaultController extends Controller
{

	public function actionIndex()
	{
        /*$userId = \App::$domain->account->auth->identity->id;
        $tokenEntity = \App::$domain->account->jwt->forge([
            'id' => $userId,
        ]);
        $jwt = $tokenEntity->token;
        $decodedEntity = \App::$domain->account->jwt->decode($jwt);

        if($decodedEntity->toArray() != $tokenEntity->toArray()) {
            prr('Not equaled!',1,1);
        }
        //prr($decodedEntity,0,1);
        prr($tokenEntity,1,1);*/
        //$r = \App::$domain->jwt->token->decodeRaw('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImtpZCI6IjZjNjk3OWVjLTk1NzUtNDc5NC05MzAzLTBkMmI4NTFlZGIwMiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkuZXhhbXBsZS5jb21cL3YxXC9hdXRoIiwic3ViamVjdCI6eyJpZCI6MX0sInN1YiI6Imh0dHA6XC9cL2FwaS5leGFtcGxlLmNvbVwvdjFcL3VzZXJcLzEiLCJhdWQiOlsiaHR0cDpcL1wvYXBpLmNvcmUueWlpIl0sImV4cCI6MTUzNjI0NzQ2Nn0.XjAxVetPxtldVYLQwkVmKNwbjlatLD5yo_PXfHcwEHo');

        //$r = \App::$domain->jwt->token->decodeRaw('eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiYWRtaW4iOnRydWV9.TJVA95OrM7E2cBab30RMHrHDcEfxjoYZgeFONFh7HgQ');

       // prr($r,1,1);

        //\App::$domain->article->article->create([]);


        //$r = \App::$domain->account->token->forge(1, '127.0.0.1');
        //prr($r,1, 1);

        //\App::$domain->account->auth->authentication('77771111111', 'Wwwqqq111');

        /**/

        //$newToken = 'jwt Mp5UH75h-SAHvhPTuKVDdIWN7hvrIjPqsDnbPlEiI8P5s8kw0pj4sxOrpCH1GbQ9B_o0dMBs0E-N_JSBDpdxnmSOdxrqOqfxw1QUKR9R5vPR3IX-6YfgHdhSnZyyz3X6';

        /*$userId = 1;
        $tokenEntity = new TokenEntity();
        $tokenEntity->subject = [
            'id' => $userId,
        ];
        \App::$domain->jwt->token->sign($tokenEntity);*/

        $tokenEntity = \App::$domain->jwt->token->forgeBySubject([
            'id' => 1,
        ]);
        $newToken = 'jwt ' . $tokenEntity->token;
        $r = \App::$domain->account->auth->authenticationByToken($newToken);


        /*$loginEntity = \App::$domain->account->auth->authentication('77771111111', 'Wwwqqq111');
        $newToken = 'default ' . $loginEntity->token;
        $r = \App::$domain->account->auth->authenticationByToken($newToken);*/

            /*$tokenEntity = \App::$domain->jwt->token->forgeBySubject([
                'id' => 1,
            ]);
            $oldToken = $tokenEntity->token;

            $authenticationEntity = new AuthenticationEntity();
            $authenticationEntity->login = '77771111111';
            $authenticationEntity->password = 'Wwwqqq111';
            $r = \App::$domain->jwt->token->authentication($oldToken, $authenticationEntity);

            $newToken = ArrayHelper::getValue($r, 'data.token.token');*/


        prr($r,1,1);

		return $this->render('index');
	}

    public function actionIndex2()
    {
        RestAsset::register(\Yii::$app->view);
        $jsCode = <<<JS

//$.domain.account.auth.logout();
$.domain.account.auth.info();
//$.domain.account.auth.authentication('77771111111', 'Wwwqqq111');

JS;
        ClientHelper::runJavasriptCode($jsCode);
        return $this->render('index');
    }

}
