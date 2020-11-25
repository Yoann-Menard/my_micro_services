<?php
declare(strict_types=1);

// User Import
use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use App\Application\Actions\User\CreateUserAction;
use App\Application\Actions\User\UpdateUserAction;
use App\Application\Actions\User\DeleteUserAction;

// Message Import
use App\Application\Actions\Message\ListMessagesAction;
use App\Application\Actions\Message\ViewMessageAction;
use App\Application\Actions\Message\CreateMessageAction;
use App\Application\Actions\Message\UpdateMessageAction;
use App\Application\Actions\Message\DeleteMessageAction;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;



return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
        $group->post('/create', CreateUserAction::class);
        $group->put('/{id}/update', UpdateUserAction::class);
        $group->delete('/{id}/delete', DeleteUserAction::class);
    });

    $app->group('/messages', function (Group $group) {
        $group->get('', ListMessagesAction::class);
        $group->get('/{id}', ViewMessageAction::class);
        $group->post('/create', CreateMessageAction::class);
        $group->put('/{id}/update', UpdateMessageAction::class);
        $group->delete('/{id}/delete', DeleteMessageAction::class);
    });
};
