curl -XPUT $E3E_HOSTNAME/idp/_mapping/idpcamp --data-binary @data/input/idp/template.json
curl -XPUT $E3E_HOSTNAME/refugee/_mapping/refugeecamp --data-binary @data/input/refugee/template.json
curl -XPUT $E3E_HOSTNAME/geonames/_mapping/geoname --data-binary @data/input/geonames/template.json