# Package skeleton

This repository contains a skeleton for creating new Composer packages.

## Usage

```shell
# Clone the repository
git clone git@github.com:nhedger/skeleton.git

# Update the remote
git remote set-url origin [URL]
```

### Shell function

> Requires `gh`, the GitHub CLI. Remaining flags are forwarded to the
> underlying `gh repo create` command.

```shell
new-package nhedger/package-name [flags]
```

```shell
function new-package() {
    local name = "$1"
    shift
    gh repo create "$name" \
      --clone \
      --template nhedger/skeleton \
      "$@"
}
```

## GitHub Actions

This skeleton sets up some GitHub Actions workflows that expect you to set a
[personal access token](https://github.com/settings/tokens/new?description=GitHub%20Actions%20token%20for%20[vendor]/[package]&scopes=repo) (PAT) named `ACTIONS_TOKEN` in the repository's
secrets. Some workflows may fail until the token is set.

## License

This package is open-sourced software licensed under the [MIT license].

[Packagist]: https://packagist.org/packages/hedger/skeleton
[Composer]: https://getcomposer.org
[MIT license]: LICENSE.md
