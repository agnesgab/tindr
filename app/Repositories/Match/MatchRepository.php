<?php

namespace App\Repositories\Match;

interface MatchRepository {

    public function getMatches(int $userId);
}
