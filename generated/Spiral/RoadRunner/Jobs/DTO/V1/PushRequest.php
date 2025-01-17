<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: jobs.proto

namespace Spiral\RoadRunner\Jobs\DTO\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * single job request
 *
 * Generated from protobuf message <code>jobs.v1.PushRequest</code>
 */
class PushRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.jobs.v1.Job job = 1;</code>
     */
    protected $job = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Spiral\RoadRunner\Jobs\DTO\V1\Job $job
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Jobs::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.jobs.v1.Job job = 1;</code>
     * @return \Spiral\RoadRunner\Jobs\DTO\V1\Job
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Generated from protobuf field <code>.jobs.v1.Job job = 1;</code>
     * @param \Spiral\RoadRunner\Jobs\DTO\V1\Job $var
     * @return $this
     */
    public function setJob($var)
    {
        GPBUtil::checkMessage($var, \Spiral\RoadRunner\Jobs\DTO\V1\Job::class);
        $this->job = $var;

        return $this;
    }

}

