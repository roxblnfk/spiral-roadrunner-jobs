<?php

/**
 * This file is part of RoadRunner package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Spiral\RoadRunner\Jobs\Task;

/**
 * @psalm-immutable
 * @psalm-allow-private-mutation
 */
abstract class Task implements TaskInterface
{
    /**
     * @var non-empty-string
     */
    protected string $queue;

    /**
     * @var non-empty-string
     */
    protected string $name;

    /**
     * @var array
     */
    protected array $payload = [];

    /**
     * @var array<non-empty-string, array<string>>
     */
    protected array $headers = [];

    /**
     * @param non-empty-string $queue
     * @param non-empty-string $name
     * @param array $payload
     * @param array<non-empty-string, array<string>> $headers
     */
    public function __construct(string $queue, string $name, array $payload = [], array $headers = [])
    {
        assert($queue !== '', 'Precondition [queue !== ""] failed');
        assert($name !== '', 'Precondition [job !== ""] failed');

        $this->queue = $queue;
        $this->name = $name;
        $this->payload = $payload;
        $this->headers = $headers;
    }

    /**
     * {@inheritDoc}
     */
    public function getQueue(): string
    {
        return $this->queue;
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function getPayload(): array
    {
        return $this->payload;
    }

    /**
     * {@inheritDoc}
     */
    public function get($key, $default = null)
    {
        // Note: The following code "$this->payload[$key] ?? $default" will
        // work faster, but it will not work correctly if the key contains
        // a NULL value.
        return $this->has($key) ? $this->payload[$key] : $default;
    }

    /**
     * {@inheritDoc}
     */
    public function has($key): bool
    {
        // Array lookup optimization: Op ISSET_ISEMPTY_VAR faster than direct
        // array_key_exists function execution.
        return isset($this->payload[$key]) || \array_key_exists($key, $this->payload);
    }

    /**
     * {@inheritDoc}
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * {@inheritDoc}
     */
    public function hasHeader(string $name): bool
    {
        return isset($this->headers[$name]) && \count($this->headers[$name]) > 0;
    }

    /**
     * {@inheritDoc}
     */
    public function getHeader(string $name): array
    {
        return $this->headers[$name] ?? [];
    }

    /**
     * {@inheritDoc}
     */
    public function getHeaderLine(string $name): string
    {
        return \implode(',', $this->getHeader($name));
    }
}