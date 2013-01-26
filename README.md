#Mogreet Bundle for Laravel 3

##Setup
Install the bundle

    $ php artisan bundle:install mogreet

Configure your `client_id` and `token` within `bundles/mogreet/config/mogreet.php`.

If you want to autoload the bundle add the following to `application/bundles.php`:

    return array(
        // ...
        'mogreet' => array('auto' => true),
        // ...
    );

##Example Usage

    Route::get('/', function ()
    {
        $mogreet = IoC::resolve('mogreet');

        $message = array(
            'campaign_id' => 'xxxxx',       // your campaign id
            'to' => 'xxxxxxxxxx',           // phone number
            'message' => "You're message",
            'content_url' => 'http://path.to.an.image.png',
        );
        $response = $mogreet->send($message);

        $code = $response->getResults();

        if ($code['Response code'] == 1)
        {
            echo "Sent successfully";
        }
        else
        {
            echo "Failed to send";
        }
    }

##Information
The bundle was tested on PHP `5.3.21` and PHP `5.4.11`.

The bulk of the bundle is basically a wrapped version of https://github.com/mogreet/phpSDK however the files were changed in the following ways:
* Modifed code which was passing variables by reference, as this causes fatal errors in 5.4
* Namespaced everything because the `Response` class was overriding Laravel's `Response` alias

Bundle created by [Tom Planer](https://github.com/tplaner).