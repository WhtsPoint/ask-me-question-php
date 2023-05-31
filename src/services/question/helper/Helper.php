<?php 

namespace Question;

use Email;
use Pagination;

class Helper {
    public function arrayToCreationDto(array $body): CreationDto {
        $isAnonymous = filter_var(@$body['isAnonymous'], FILTER_VALIDATE_BOOL);
        $dto = new CreationDto(
            new Message(@$body['message']),
            $isAnonymous,
            !$isAnonymous ? new Name(@$body['name']) : NULL,
            (!$isAnonymous && is_string(@$body['mail'])) ? new Email(@$body['mail']) : NULL,
            time()
        );
     
        return $dto; 
    }

    public function arrayToPagination(array $body): Pagination {
        return new Pagination(@$body['page'], @$body['count']);
    }
}