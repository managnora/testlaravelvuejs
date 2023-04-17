<?php

namespace Core\BusinessModel\Task;

class Tree
{
    public const BACK_LOG = 0;
    public const TO_DO = 1;
    public const PROGRESS = 2;
    public const WAITING_REVIEW = 3;
    public const IN_CODE_REVIEW = 4;
    public const PENDING = 5;
    public const TO_MERGE = 6;
    public const VALIDATION = 7;
    public const DONE = 8;
    public const IN_PREP = 9;
    public const MEP = 10;
}
