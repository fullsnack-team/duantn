<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\Address\Province;
use App\Models\Address\District;
use App\Models\Address\Commune;
class CrawlGeoDataCommand extends Command
{
    protected $signature = 'crawl:geo-data';

    protected $description = 'Crawl provinces, districts, and communes data and save to database';

    public function handle()
    {
        $provincesResponse = $this->sendApiRequest('https://api.mysupership.vn/v1/partner/areas/province');
        $provincesData = $provincesResponse['results'];
        foreach ($provincesData as $provinceData) {
            $province = Province::updateOrCreate([
                'name' => $provinceData['name'],
            ]);
            $districtsResponse = $this->sendApiRequest('https://api.mysupership.vn/v1/partner/areas/district', [
                'province' => $provinceData['code'],
            ]);

            $districtsData = $districtsResponse['results'];

            foreach ($districtsData as $districtData) {
                $district = District::updateOrCreate( [
                    'name' => $districtData['name'],
                    'province_id' => $province->id,
                ]);
                $communesResponse = $this->sendApiRequest('https://api.mysupership.vn/v1/partner/areas/commune', [
                    'district' => $districtData['code'],
                ]);

                $communesData = $communesResponse['results'];

                foreach ($communesData as $communeData) {
                    // Lưu dữ liệu xã vào bảng communes
                    Commune::updateOrCreate([
                        'name' => $communeData['name'],
                        'district_id' => $district->id,
                    ]);
                }
            }
        }
        $this->info('Provinces, districts, and communes data crawled and saved to database.');
    }
    private function sendApiRequest($url, $params = [])
    {
        $ch = curl_init();

        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);
    }
}
