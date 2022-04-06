# -- Project information -----------------------------------------------------

project = 'Skeleton'
copyright = '2022, Nicolas Hedger'
author = 'Nicolas Hedger'

# -- General configuration ---------------------------------------------------

# Add any Sphinx extension module names here, as strings. They can be
# extensions coming with Sphinx (named 'sphinx.ext.*') or your custom
# ones.
extensions = [
    'sphinx_copybutton',
    'sphinx_inline_tabs',
]

# Add any paths that contain templates here, relative to this directory.
templates_path = ['_templates']

# List of patterns, relative to source directory, that match files and
# directories to ignore when looking for source files.
# This pattern also affects html_static_path and html_extra_path.
exclude_patterns = ['_build', 'Thumbs.db', '.DS_Store']


# -- Options for HTML output -------------------------------------------------

# The theme to use for HTML and HTML Help pages.  See the documentation for
# a list of builtin themes.

html_title = 'Pact.'
html_theme = 'furo'

html_theme_options = {
    "light_css_variables": {
        "color-brand-primary": "#0284C7",
        "color-brand-content": "#0284C7",
        "font-stack": "Inter, sans-serif",
    },
}

# Add any paths that contain custom static files (such as style sheets) here,
# relative to this directory. They are copied after the builtin static files,
# so a file named "default.css" will overwrite the builtin "default.css".
html_static_path = ['_static']

html_css_files = [
    'css/custom.css'
]

pygments_style = "emacs"

# Customize sphinx lexers to support inline code highlighting.
from sphinx.highlighting import lexers
from pygments.lexers.web import PhpLexer
from pygments.lexers.data import YamlLexer
lexers['php'] = PhpLexer(startinline=True)
lexers['yaml'] = YamlLexer(startinline=True)
