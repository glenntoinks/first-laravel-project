<?php

namespace App\Enums;

enum TicketStatus: string
{
    case NEW = 'New';
    case RESOLVED = 'Resolved';
    case REJECTED = 'Rejected';
    case PENDING_USER = 'Pending Requester';
    case PENDING_UPDATE = 'Pending Responder';
}