# Sitegeist.Kaleidoscope.ValueObjects.Migrations

Neos 8 Migrations to convert properties to ImageSourceProxies.

### Authors & Sponsors

* Martin Ficzel - ficzel@sitegeist.de

*The development and the public-releases of this package is generously sponsored
by our employer http://www.sitegeist.de.*

## Installation

Sitegeist.Kaleidoscope.ValueObjects.Migrations is available via packagist run `composer require sitegeist/kaleidoscope-valueobjects-migrations`.
We use semantic versioning so every breaking change will increase the major-version number.

## Usage

To convert existing Nodes to the new ImageSourceProxy and ImageSourceProxyCollection you can use the included 
transformation and configure your own content migrations.

```yaml
up:
  comments: 'Convert Images and Asset[] to ImageSourceProxy and ImageSourceProxyCollection'
  migration:
    - filters:
        - type: 'NodeType'
          settings:
            nodeType: 'Vendor.Site:Node'
            withSubTypes: true
      transformations:
        - type: '\Sitegeist\Kaleidoscope\ValueObjects\Migration\Transformations\ImageToImageSourceProxy'
          settings:
            sourceProperty: 'image'
            targetProperty: 'image'
            altProperty: 'imageAlt'
            titleProperty: 'imageTitle'
        - type: '\Sitegeist\Kaleidoscope\ValueObjects\Migration\Transformations\AssetsToImageSourceProxyCollection'
          settings:
            sourceProperty: 'imageList'
            targetProperty: 'imageList'

down:
  comments: 'Convert ImageSourceProxy and ImageSourceProxyCollection back to Images'
  migration:
      - filters:
            - type: 'NodeType'
              settings:
                  nodeType: 'Vendor.Site:Node'
                  withSubTypes: true
        transformations:
            - type: '\Sitegeist\Kaleidoscope\ValueObjects\Migration\Transformations\ImageSourceProxyToImage'
              settings:
                  sourceProperty: 'image'
                  targetProperty: 'image'
                  altProperty: 'imageAlt'
                  titleProperty: 'imageTitle'
            - type: '\Sitegeist\Kaleidoscope\ValueObjects\Migration\Transformations\ImageSourceProxyCollectionToAssets'
              settings:
                  sourceProperty: 'imageList'
                  targetProperty: 'imageList'

```

## Contribution

We will gladly accept contributions. Please send us pull requests.
