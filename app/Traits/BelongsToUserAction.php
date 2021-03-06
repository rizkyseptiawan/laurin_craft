<?php

namespace App\Traits;

trait BelongsToUserAction
{
    /**
     * @param mixed $userId
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    private function checkPermission($userId)
    {
        $isOwned = $userId == auth()->id();
        abort_unless($isOwned, 403); // TODO: Add role check
    }
}
