
var eightapp = angular.module('eightAng', []);

eightapp.controller('eight_controller', function ($scope) {

	$scope.search = "";
	$scope.order = "email";
	$scope.selectedIndex = null;
	$scope.selectedPerson = null;

	$scope.selectPerson = function (person, index) {
		$scope.selectedIndex = index;
		$scope.selectedPerson = person;
	};

	$scope.sensitiveSearch = function(person) {
		if ($scope.search) {
			return person.name.indexOf($scope.search) == 0 ||
				     person.email.indexOf($scope.search) == 0;
		}
		return true;
	};

	$scope.persons = [
		{
			"name": "Henryk Akerman",
			"email": "Akerman@o2.pl",
			"birthdate": "2016-03-23T18:11:27-07:00",
			"phonenumber": "+4862 073918",
			"address": "Warta, ul. Polska",
			"city": "Warta",
			"country": "Poland"
		},
		{
			"name": "Adam Adamowicz",
			"email": "Adam.Gto@necimp.co.uk",
			"birthdate": "2013-12-28T06:02:56-08:00",
			"phonenumber": "48 888 324",
			"address": "ul. Paderewskiego",
			"city": "Warszawa",
			"country": ""
		},
		{
			"name": "William Abbott",
			"email": "non.justo.Proin@mauris.net",
			"birthdate": "2015-07-30T09:00:15-07:00",
			"phonenumber": "(01984) 57054",
			"address": "418-3595 Orci, St.",
			"city": "Lint",
			"country": "Sierra Leone"
		},
		{
			"name": "Amal Shaw",
			"email": "ornare.sagittis@ipsumPhasellus.co.uk",
			"birthdate": "2014-06-01T11:06:13-07:00",
			"phonenumber": "076 4830 0002",
			"address": "Ap #706-3890 Lobortis St.",
			"city": "Baiso",
			"country": "Faroe Islands"
		},
		{
			"name": "Avram Barrett",
			"email": "Donec@lobortisultrices.co.uk",
			"birthdate": "2014-07-17T19:31:30-07:00",
			"phonenumber": "(01289) 68589",
			"address": "560-5646 Ipsum Rd.",
			"city": "Grand-Manil",
			"country": "Trinidad and Tobago"
		},
		{
			"name": "Hamilton Webb",
			"email": "Nam@noncursusnon.ca",
			"birthdate": "2015-12-11T19:31:34-08:00",
			"phonenumber": "(01913) 41035",
			"address": "696-957 Morbi Street",
			"city": "Grand-Halleux",
			"country": "Montenegro"
		},
		{
			"name": "Emerson Osborn",
			"email": "Sed.congue@auctor.co.uk",
			"birthdate": "2015-04-07T12:13:00-07:00",
			"phonenumber": "0800 090144",
			"address": "295-673 Ac Ave",
			"city": "Baracaldo",
			"country": "South Georgia and The South Sandwich Islands"
		},
		{
			"name": "Rashad Johnson",
			"email": "fringilla.Donec@Infaucibus.org",
			"birthdate": "2014-09-22T18:20:45-07:00",
			"phonenumber": "(022) 8324 6041",
			"address": "P.O. Box 904, 7138 Metus Rd.",
			"city": "Wichelen",
			"country": "Niger"
		},
		{
			"name": "Brody Page",
			"email": "nibh.Phasellus@eratvel.co.uk",
			"birthdate": "2014-10-22T17:28:13-07:00",
			"phonenumber": "(013459) 03264",
			"address": "7456 Augue Rd.",
			"city": "Pocatello",
			"country": "Malta"
		},
		{
			"name": "Armando Bradford",
			"email": "rutrum.eu@velpedeblandit.com",
			"birthdate": "2016-02-04T23:16:13-08:00",
			"phonenumber": "070 7348 5382",
			"address": "P.O. Box 401, 8742 Sed St.",
			"city": "Crewe",
			"country": "Philippines"
		},
		{
			"name": "Malik Carpenter",
			"email": "id.ante@pede.edu",
			"birthdate": "2014-08-08T15:40:44-07:00",
			"phonenumber": "(0115) 666 9816",
			"address": "Ap #297-3670 Non, Rd.",
			"city": "Harrisburg",
			"country": "Vanuatu"
		},
		{
			"name": "Reece Figueroa",
			"email": "tellus@primisin.net",
			"birthdate": "2016-01-01T14:09:35-08:00",
			"phonenumber": "(0118) 864 1600",
			"address": "Ap #974-8842 Duis Ave",
			"city": "Pagazzano",
			"country": "Sao Tome and Principe"
		},
		{
			"name": "Orlando Morales",
			"email": "magna.Ut@iaculis.net",
			"birthdate": "2015-04-26T02:09:27-07:00",
			"phonenumber": "0800 750400",
			"address": "Ap #139-2923 Sem. Rd.",
			"city": "Montgomery",
			"country": "Uzbekistan"
		},
		{
			"name": "Clarke Guerrero",
			"email": "placerat.Cras@et.net",
			"birthdate": "2014-10-31T18:40:17-07:00",
			"phonenumber": "070 6869 6797",
			"address": "P.O. Box 151, 8680 Sit Rd.",
			"city": "Gwalior",
			"country": "Ecuador"
		},
		{
			"name": "Jasper Olson",
			"email": "at.augue@utlacus.ca",
			"birthdate": "2015-07-04T10:52:38-07:00",
			"phonenumber": "056 8529 1645",
			"address": "8544 Non, St.",
			"city": "Oban",
			"country": "Egypt"
		},
		{
			"name": "Xavier Spears",
			"email": "mauris@nectempusscelerisque.net",
			"birthdate": "2014-04-23T18:00:31-07:00",
			"phonenumber": "055 7978 7806",
			"address": "P.O. Box 864, 5387 Vulputate, Street",
			"city": "Cuddapah",
			"country": "Thailand"
		},
		{
			"name": "Lucian Gomez",
			"email": "augue.id.ante@Cumsociis.edu",
			"birthdate": "2015-12-30T04:41:45-08:00",
			"phonenumber": "(028) 6676 3701",
			"address": "P.O. Box 489, 5285 Proin Rd.",
			"city": "Laino Castello",
			"country": "Slovenia"
		},
		{
			"name": "Vladimir Calhoun",
			"email": "diam@non.org",
			"birthdate": "2014-06-09T14:58:33-07:00",
			"phonenumber": "0500 911378",
			"address": "623-3215 Magna. Avenue",
			"city": "Leval-Chaudeville",
			"country": "British Indian Ocean Territory"
		},
		{
			"name": "Armand Ryan",
			"email": "placerat.augue.Sed@et.co.uk",
			"birthdate": "2015-07-09T08:59:57-07:00",
			"phonenumber": "(0110) 232 3739",
			"address": "Ap #474-4393 Hendrerit Street",
			"city": "Rosolini",
			"country": "Bermuda"
		},
		{
			"name": "Aristotle Matthews",
			"email": "eros.turpis@Integerurna.edu",
			"birthdate": "2014-09-09T17:47:33-07:00",
			"phonenumber": "0800 929617",
			"address": "9971 Aliquam Avenue",
			"city": "Gerpinnes",
			"country": "Tajikistan"
		},
		{
			"name": "Valentine Cervantes",
			"email": "Fusce.fermentum.fermentum@urnaNuncquis.co.uk",
			"birthdate": "2015-05-16T18:38:12-07:00",
			"phonenumber": "0800 088902",
			"address": "P.O. Box 263, 5634 Facilisi. Ave",
			"city": "Nandyal",
			"country": "Norway"
		},
		{
			"name": "Cyrus Hartman",
			"email": "dapibus.id.blandit@porttitor.edu",
			"birthdate": "2014-06-12T07:30:12-07:00",
			"phonenumber": "(01412) 250012",
			"address": "Ap #543-4793 Eleifend St.",
			"city": "Tuktoyaktuk",
			"country": "Holy See (Vatican City State)"
		},
		{
			"name": "Keaton Floyd",
			"email": "nibh.lacinia@vitaeorci.ca",
			"birthdate": "2015-12-13T18:29:00-08:00",
			"phonenumber": "(0118) 332 5673",
			"address": "P.O. Box 587, 4696 Vitae Rd.",
			"city": "Satriano di Lucania",
			"country": "Tajikistan"
		},
		{
			"name": "Yasir Sosa",
			"email": "bibendum.fermentum@CrasinterdumNunc.org",
			"birthdate": "2014-07-19T10:24:35-07:00",
			"phonenumber": "055 7799 2635",
			"address": "P.O. Box 140, 7479 Ipsum. Rd.",
			"city": "Governador Valadares",
			"country": "Namibia"
		},
		{
			"name": "Cruz Jennings",
			"email": "ipsum.Suspendisse@arcu.net",
			"birthdate": "2015-07-03T04:26:30-07:00",
			"phonenumber": "07750 484238",
			"address": "129-6174 Massa. Road",
			"city": "Pabianice",
			"country": "Suriname"
		},
		{
			"name": "Blaze Keller",
			"email": "neque.venenatis.lacus@acarcu.edu",
			"birthdate": "2015-11-16T22:14:29-08:00",
			"phonenumber": "(028) 4719 1558",
			"address": "P.O. Box 511, 6059 Ut Ave",
			"city": "Drachten",
			"country": "Åland Islands"
		},
		{
			"name": "Dale Rodriguez",
			"email": "molestie.in.tempus@Fusce.com",
			"birthdate": "2014-12-15T09:49:29-08:00",
			"phonenumber": "(01469) 96494",
			"address": "249-3137 Nec, St.",
			"city": "Acquasparta",
			"country": "Comoros"
		},
		{
			"name": "Connor Dorsey",
			"email": "non.sollicitudin@sitametrisus.ca",
			"birthdate": "2014-11-10T13:24:04-08:00",
			"phonenumber": "0800 582052",
			"address": "6918 Vulputate, Road",
			"city": "Ponti",
			"country": "Lebanon"
		},
		{
			"name": "Ira Carroll",
			"email": "interdum.Curabitur.dictum@augueidante.co.uk",
			"birthdate": "2014-08-11T17:38:02-07:00",
			"phonenumber": "(0111) 470 8010",
			"address": "P.O. Box 284, 2166 Pharetra. Rd.",
			"city": "College",
			"country": "Sint Maarten"
		},
		{
			"name": "Clark Gilbert",
			"email": "urna.et@nectempusmauris.ca",
			"birthdate": "2015-04-11T19:09:42-07:00",
			"phonenumber": "(016977) 6357",
			"address": "Ap #603-6579 Vitae Av.",
			"city": "Meer",
			"country": "Haiti"
		},
		{
			"name": "Wayne Hughes",
			"email": "vulputate.eu.odio@ipsumnuncid.com",
			"birthdate": "2015-09-07T20:04:59-07:00",
			"phonenumber": "(01165) 332450",
			"address": "Ap #435-2695 Odio Av.",
			"city": "Rhyl",
			"country": "French Polynesia"
		},
		{
			"name": "Curran Pacheco",
			"email": "dictum@tempuslorem.ca",
			"birthdate": "2014-12-29T11:56:31-08:00",
			"phonenumber": "0800 694417",
			"address": "Ap #687-2400 Metus. Rd.",
			"city": "Rockville",
			"country": "Montenegro"
		},
		{
			"name": "Prescott Reed",
			"email": "id@Aliquamvulputateullamcorper.net",
			"birthdate": "2015-10-24T20:10:05-07:00",
			"phonenumber": "0841 602 2483",
			"address": "1957 Pellentesque Street",
			"city": "Jhansi",
			"country": "Saint Pierre and Miquelon"
		}

	]
	$scope.rowLimit = 32;
});