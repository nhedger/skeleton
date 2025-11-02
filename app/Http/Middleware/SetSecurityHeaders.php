<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Vite;

class SetSecurityHeaders
{
    public function handle(Request $request, Closure $next)
    {
        Vite::useCspNonce();

        /** @var Response */
        $response = $next($request);

        // Only apply security headers in production environment
        if (!app()->isProduction()) {
            return $response;
        }

        $this->enableHSTS($response);
        $this->enableCSP($response);
        $this->setReferrerPolicy($response);
        $this->setPermissionsPolicy($response);

        return $response;
    }

    /**
     * Enable HTTP Strict Transport Security (HSTS)
     * 
     * This method ensures that HTTP Strict Transport Security headers are set
     * on the response to enforce secure (HTTPS) connections to the server.
     */
    protected function enableHSTS(Response $response): void
    {
        $response->headers->set(
            key: 'Strict-Transport-Security',
            values: 'max-age=63072000; includeSubDomains;',
            replace: true,
        );
    }

    /**
     * Enable Content Security Policy (CSP)
     * 
     * This method sets the Content Security Policy headers on the response
     * to enhance security by restricting the sources from which content can be loaded.
     */
    protected function enableCSP(Response $response): void
    {
        $response->headers->set(
            key: 'Content-Security-Policy',
            values: "script-src 'nonce-" . Vite::cspNonce() . "' 'strict-dynamic'; object-src 'none'; base-uri 'none'; require-trusted-types-for 'script';",
            replace: true,
        );
    }

    /**
     * Set Referrer Policy
     * 
     * This method sets the Referrer-Policy header on the response to control 
     * the amount of referrer information sent with requests made from the 
     * document.
     */
    protected function setReferrerPolicy(Response $response): void
    {
        $response->headers->set(
            key: 'Referrer-Policy',
            values: 'strict-origin',
            replace: true,
        );
    }

    /**
     * Set Permissions Policy
     * 
     * This method sets the Permissions-Policy header on the response to control
     * which features and APIs can be used in the browser.
     */
    protected function setPermissionsPolicy(Response $response): void
    {
        $response->headers->set(
            key: 'Permissions-Policy',
            values: 'autoplay=(), battery=(), cross-origin-isolated=(), execution-while-not-rendered=()',
            replace: true,
        );
    }
}
