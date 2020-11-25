<?php
declare(strict_types=1);

namespace App\Application\Actions\Message;

use Psr\Http\Message\ResponseInterface as Response;

class ListMessageAction extends MessageAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $messages = $this->userRepository->findAll();

        $this->logger->info("Message list was viewed.");

        return $this->respondWithData($messages);
    }
}
