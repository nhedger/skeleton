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




## License

This package is open-sourced software licensed under the [MIT license].

[Packagist]: https://packagist.org/packages/hedger/skeleton
[Composer]: https://getcomposer.org
[MIT license]: LICENSE.md
