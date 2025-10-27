<?php
	declare(strict_types=1);

	namespace Fawno\MetadataToolkit\Metadata\IRB;

	use Fawno\MetadataToolkit\Metadata\IRB\Tag\IRBTag;

	class IRBTags {
		/*
		2000-2997 => \x07D0-\x0BB6 Path Information (saved paths). See See Path resource format.
		4000-4999 => \x0FA0-\x1387 Plug-In resource(s). Resources added by a plug-in. See the plug-in API found in the SDK documentation
		*/

		/**
		 * Image Resource IDs
		 *
		 * Image resources use several standard ID numbers, as shown in the [Image resource IDs](https://www.adobe.com/devnet-apps/photoshop/fileformatashtml/PhotoshopFileFormats.htm#50577409_38034). Not all file formats use all ID's. Some information may be stored in other sections of the file.
		 *
		 * For those resource IDs that have been added since Photoshop 3.0. the entry indicates the version in which they were introduced, e.g. ( Photoshop 6.0)
		 */
		public const IRIDS = [
			1000 => [
				'hex' => '03E8',
				'name' => 'Photoshop2Info',
				'description' => '(Obsolete--Photoshop 2.0 only) Contains five 2-byte values: number of channels, rows, columns, depth, and mode',
			],
			1001 => [
				'hex' => '03E9',
				'name' => 'MacintoshPrintInfo',
				'description' => 'Macintosh print manager print info record',
			],
			1002 => [
				'hex' => '03EA',
				'name' => 'XMLData',
				'description' => 'Macintosh page format information. No longer read by Photoshop. (Obsolete)',
			],
			1003 => [
				'hex' => '03EB',
				'name' => 'Photoshop2ColorTable',
				'description' => '(Obsolete--Photoshop 2.0 only) Indexed color table',
			],
			1005 => [
				'hex' => '03ED',
				'name' => 'ResolutionInfo',
				'description' => 'ResolutionInfo structure. See Appendix A in Photoshop API Guide.pdf.',
			],
			1006 => [
				'hex' => '03EE',
				'name' => 'AlphaChannelsNames',
				'description' => 'Names of the alpha channels as a series of Pascal strings.',
			],
			1007 => [
				'hex' => '03EF',
				'name' => 'DisplayInfo',
				'description' => '(Obsolete) See ID 1077DisplayInfo structure. See Appendix A in Photoshop API Guide.pdf.',
			],
			1008 => [
				'hex' => '03F0',
				'name' => 'PStringCaption',
				'description' => 'The caption as a Pascal string.',
			],
			1009 => [
				'hex' => '03F1',
				'name' => 'BorderInformation',
				'description' => 'Border information. Contains a fixed number (2 bytes real, 2 bytes fraction) for the border width, and 2 bytes for border units (1 = inches, 2 = cm, 3 = points, 4 = picas, 5 = columns).',
			],
			1010 => [
				'hex' => '03F2',
				'name' => 'BackgroundColor',
				'description' => 'Background color. See See Color structure.',
			],
			1011 => [
				'hex' => '03F3',
				'name' => 'PrintFlags',
				'description' => 'Print flags. A series of one-byte boolean values (see Page Setup dialog): labels, crop marks, color bars, registration marks, negative, flip, interpolate, caption, print flags.',
			],
			1012 => [
				'hex' => '03F4',
				'name' => 'BW_HalftoningInfo',
				'description' => 'Grayscale and multichannel halftoning information',
			],
			1013 => [
				'hex' => '03F5',
				'name' => 'ColorHalftoningInfo',
				'description' => 'Color halftoning information',
			],
			1014 => [
				'hex' => '03F6',
				'name' => 'DuotoneHalftoningInfo',
				'description' => 'Duotone halftoning information',
			],
			1015 => [
				'hex' => '03F7',
				'name' => 'BW_TransferFunc',
				'description' => 'Grayscale and multichannel transfer function',
			],
			1016 => [
				'hex' => '03F8',
				'name' => 'ColorTransferFuncs',
				'description' => 'Color transfer functions',
			],
			1017 => [
				'hex' => '03F9',
				'name' => 'DuotoneTransferFuncs',
				'description' => 'Duotone transfer functions',
			],
			1018 => [
				'hex' => '03FA',
				'name' => 'DuotoneImageInfo',
				'description' => 'Duotone image information',
			],
			1019 => [
				'hex' => '03FB',
				'name' => 'EffectiveBW',
				'description' => 'Two bytes for the effective black and white values for the dot range',
			],
			1020 => [
				'hex' => '03FC',
				'name' => 'ObsoletePhotoshopTag1',
				'description' => '(Obsolete)',
			],
			1021 => [
				'hex' => '03FD',
				'name' => 'EPSOptions',
				'description' => 'EPS options',
			],
			1022 => [
				'hex' => '03FE',
				'name' => 'QuickMaskInfo',
				'description' => 'Quick Mask information. 2 bytes containing Quick Mask channel ID; 1- byte boolean indicating whether the mask was initially empty.',
			],
			1023 => [
				'hex' => '03FF',
				'name' => 'ObsoletePhotoshopTag2',
				'description' => '(Obsolete)',
			],
			1024 => [
				'hex' => '0400',
				'name' => 'TargetLayerID',
				'description' => 'Layer state information. 2 bytes containing the index of target layer (0 = bottom layer).',
			],
			1025 => [
				'hex' => '0401',
				'name' => 'WorkingPath',
				'description' => 'Working path (not saved). See See Path resource format.',
			],
			1026 => [
				'hex' => '0402',
				'name' => 'LayersGroupInfo',
				'description' => 'Layers group information. 2 bytes per layer containing a group ID for the dragging groups. Layers in a group have the same group ID.',
			],
			1027 => [
				'hex' => '0403',
				'name' => 'ObsoletePhotoshopTag3',
				'description' => '(Obsolete)',
			],
			1028 => [
				'hex' => '0404',
				'name' => 'IPTCData',
				'description' => 'IPTC-NAA record. Contains the File Info... information. See the documentation in the IPTC folder of the Documentation folder.',
			],
			1029 => [
				'hex' => '0405',
				'name' => 'RawImageMode',
				'description' => 'Image mode for raw format files',
			],
			1030 => [
				'hex' => '0406',
				'name' => 'JPEG_Quality',
				'description' => 'JPEG quality. Private.',
			],
			1032 => [
				'hex' => '0408',
				'name' => 'GridGuidesInfo',
				'description' => '(Photoshop 4.0) Grid and guides information. See See Grid and guides resource format.',
			],
			1033 => [
				'hex' => '0409',
				'name' => 'PhotoshopBGRThumbnail',
				'description' => '(Photoshop 4.0) Thumbnail resource for Photoshop 4.0 only. See See Thumbnail resource format.',
			],
			1034 => [
				'hex' => '040A',
				'name' => 'CopyrightFlag',
				'description' => '(Photoshop 4.0) Copyright flag. Boolean indicating whether image is copyrighted. Can be set via Property suite or by user in File Info...',
			],
			1035 => [
				'hex' => '040B',
				'name' => 'URL',
				'description' => '(Photoshop 4.0) URL. Handle of a text string with uniform resource locator. Can be set via Property suite or by user in File Info...',
			],
			1036 => [
				'hex' => '040C',
				'name' => 'PhotoshopThumbnail',
				'description' => '(Photoshop 5.0) Thumbnail resource (supersedes resource 1033). See See Thumbnail resource format.',
			],
			1037 => [
				'hex' => '040D',
				'name' => 'GlobalAngle',
				'description' => '(Photoshop 5.0) Global Angle. 4 bytes that contain an integer between 0 and 359, which is the global lighting angle for effects layer. If not present, assumed to be 30.',
			],
			1038 => [
				'hex' => '040E',
				'name' => 'ColorSamplersResource',
				'description' => '(Obsolete) See ID 1073 below. (Photoshop 5.0) Color samplers resource. See See Color samplers resource format.',
			],
			1039 => [
				'hex' => '040F',
				'name' => 'ICC_Profile',
				'description' => '(Photoshop 5.0) ICC Profile. The raw bytes of an ICC (International Color Consortium) format profile. See ICC1v42_2006-05.pdf in the Documentation folder and icProfileHeader.h in Sample Code\Common\Includes .',
			],
			1040 => [
				'hex' => '0410',
				'name' => 'Watermark',
				'description' => '(Photoshop 5.0) Watermark. One byte.',
			],
			1041 => [
				'hex' => '0411',
				'name' => 'ICC_Untagged',
				'description' => '(Photoshop 5.0) ICC Untagged Profile. 1 byte that disables any assumed profile handling when opening the file. 1 = intentionally untagged.',
			],
			1042 => [
				'hex' => '0412',
				'name' => 'EffectsVisible',
				'description' => '(Photoshop 5.0) Effects visible. 1-byte global flag to show/hide all the effects layer. Only present when they are hidden.',
			],
			1043 => [
				'hex' => '0413',
				'name' => 'SpotHalftone',
				'description' => '(Photoshop 5.0) Spot Halftone. 4 bytes for version, 4 bytes for length, and the variable length data.',
			],
			1044 => [
				'hex' => '0414',
				'name' => 'IDsBaseValue',
				'description' => '(Photoshop 5.0) Document-specific IDs seed number. 4 bytes: Base value, starting at which layer IDs will be generated (or a greater value if existing IDs already exceed it). Its purpose is to avoid the case where we add layers, flatten, save, open, and then add more layers that end up with the same IDs as the first set.',
			],
			1045 => [
				'hex' => '0415',
				'name' => 'UnicodeAlphaNames',
				'description' => '(Photoshop 5.0) Unicode Alpha Names. Unicode string',
			],
			1046 => [
				'hex' => '0416',
				'name' => 'IndexedColorTableCount',
				'description' => '(Photoshop 6.0) Indexed Color Table Count. 2 bytes for the number of colors in table that are actually defined',
			],
			1047 => [
				'hex' => '0417',
				'name' => 'TransparentIndex',
				'description' => '(Photoshop 6.0) Transparency Index. 2 bytes for the index of transparent color, if any.',
			],
			1049 => [
				'hex' => '0419',
				'name' => 'GlobalAltitude',
				'description' => '(Photoshop 6.0) Global Altitude. 4 byte entry for altitude',
			],
			1050 => [
				'hex' => '041A',
				'name' => 'SliceInfo',
				'description' => '(Photoshop 6.0) Slices. See See Slices resource format.',
			],
			1051 => [
				'hex' => '041B',
				'name' => 'WorkflowURL',
				'description' => '(Photoshop 6.0) Workflow URL. Unicode string',
			],
			1052 => [
				'hex' => '041C',
				'name' => 'JumpToXPEP',
				'description' => '(Photoshop 6.0) Jump To XPEP. 2 bytes major version, 2 bytes minor version, 4 bytes count. Following is repeated for count: 4 bytes block size, 4 bytes key, if key ="jtDd", then next is a Boolean for the dirty flag; otherwise it\'s a 4 byte entry for the mod date.',
			],
			1053 => [
				'hex' => '041D',
				'name' => 'AlphaIdentifiers',
				'description' => '(Photoshop 6.0) Alpha Identifiers. 4 bytes of length, followed by 4 bytes each for every alpha identifier.',
			],
			1054 => [
				'hex' => '041E',
				'name' => 'URL_List',
				'description' => '(Photoshop 6.0) URL List. 4 byte count of URLs, followed by 4 byte long, 4 byte ID, and Unicode string for each count.',
			],
			1057 => [
				'hex' => '0421',
				'name' => 'VersionInfo',
				'description' => '(Photoshop 6.0) Version Info. 4 bytes version, 1 byte hasRealMergedData , Unicode string: writer name, Unicode string: reader name, 4 bytes file version.',
			],
			1058 => [
				'hex' => '0422',
				'name' => 'ExifInfo',
				'description' => '(Photoshop 7.0) Exif data 1. See http://www.kodak.com/global/plugins/acrobat/en/service/digCam/exifStandard2.pdf',
			],
			1059 => [
				'hex' => '0423',
				'name' => 'ExifInfo2',
				'description' => '(Photoshop 7.0) Exif data 3. See http://www.kodak.com/global/plugins/acrobat/en/service/digCam/exifStandard2.pdf',
			],
			1060 => [
				'hex' => '0424',
				'name' => 'XMP',
				'description' => '(Photoshop 7.0) XMP metadata. File info as XML description. See http://www.adobe.com/devnet/xmp/',
			],
			1061 => [
				'hex' => '0425',
				'name' => 'IPTCDigest',
				'description' => '(Photoshop 7.0) Caption digest. 16 bytes: RSA Data Security, MD5 message-digest algorithm',
			],
			1062 => [
				'hex' => '0426',
				'name' => 'PrintScaleInfo',
				'description' => '(Photoshop 7.0) Print scale. 2 bytes style (0 = centered, 1 = size to fit, 2 = user defined). 4 bytes x location (floating point). 4 bytes y location (floating point). 4 bytes scale (floating point)',
			],
			1064 => [
				'hex' => '0428',
				'name' => 'PixelInfo',
				'description' => '(Photoshop CS) Pixel Aspect Ratio. 4 bytes (version = 1 or 2), 8 bytes double, x / y of a pixel. Version 2, attempting to correct values for NTSC and PAL, previously off by a factor of approx. 5%.',
			],
			1065 => [
				'hex' => '0429',
				'name' => 'LayerComps',
				'description' => '(Photoshop CS) Layer Comps. 4 bytes (descriptor version = 16), Descriptor (see See Descriptor structure)',
			],
			1066 => [
				'hex' => '042A',
				'name' => 'AlternateDuotoneColors',
				'description' => '(Photoshop CS) Alternate Duotone Colors. 2 bytes (version = 1), 2 bytes count, following is repeated for each count: [ Color: 2 bytes for space followed by 4 * 2 byte color component ], following this is another 2 byte count, usually 256, followed by Lab colors one byte each for L, a, b. This resource is not read or used by Photoshop.',
			],
			1067 => [
				'hex' => '042B',
				'name' => 'AlternateSpotColors',
				'description' => '(Photoshop CS)Alternate Spot Colors. 2 bytes (version = 1), 2 bytes channel count, following is repeated for each count: 4 bytes channel ID, Color: 2 bytes for space followed by 4 * 2 byte color component. This resource is not read or used by Photoshop.',
			],
			1069 => [
				'hex' => '042D',
				'name' => 'LayerSelectionIDs',
				'description' => '(Photoshop CS2) Layer Selection ID(s). 2 bytes count, following is repeated for each count: 4 bytes layer ID',
			],
			1070 => [
				'hex' => '042E',
				'name' => 'HDRToningInfo',
				'description' => '(Photoshop CS2) HDR Toning information',
			],
			1071 => [
				'hex' => '042F',
				'name' => 'PrintInfo',
				'description' => '(Photoshop CS2) Print info',
			],
			1072 => [
				'hex' => '0430',
				'name' => 'LayerGroupsEnabledID',
				'description' => '(Photoshop CS2) Layer Group(s) Enabled ID. 1 byte for each layer in the document, repeated by length of the resource. NOTE: Layer groups have start and end markers',
			],
			1073 => [
				'hex' => '0431',
				'name' => 'ColorSamplersResource2',
				'description' => '(Photoshop CS3) Color samplers resource. Also see ID 1038 for old format. See See Color samplers resource format.',
			],
			1074 => [
				'hex' => '0432',
				'name' => 'MeasurementScale',
				'description' => '(Photoshop CS3) Measurement Scale. 4 bytes (descriptor version = 16), Descriptor (see See Descriptor structure)',
			],
			1075 => [
				'hex' => '0433',
				'name' => 'TimelineInfo',
				'description' => '(Photoshop CS3) Timeline Information. 4 bytes (descriptor version = 16), Descriptor (see See Descriptor structure)',
			],
			1076 => [
				'hex' => '0434',
				'name' => 'SheetDisclosure',
				'description' => '(Photoshop CS3) Sheet Disclosure. 4 bytes (descriptor version = 16), Descriptor (see See Descriptor structure)',
			],
			1077 => [
				'hex' => '0435',
				'name' => 'ChannelOptions',
				'description' => '(Photoshop CS3) DisplayInfo structure to support floating point clors. Also see ID 1007. See Appendix A in Photoshop API Guide.pdf .',
			],
			1078 => [
				'hex' => '0436',
				'name' => 'OnionSkins',
				'description' => '(Photoshop CS3) Onion Skins. 4 bytes (descriptor version = 16), Descriptor (see See Descriptor structure)',
			],
			1080 => [
				'hex' => '0438',
				'name' => 'CountInfo',
				'description' => '(Photoshop CS4) Count Information. 4 bytes (descriptor version = 16), Descriptor (see See Descriptor structure) Information about the count in the document. See the Count Tool.',
			],
			1082 => [
				'hex' => '043A',
				'name' => 'PrintInfo2',
				'description' => '(Photoshop CS5) Print Information. 4 bytes (descriptor version = 16), Descriptor (see See Descriptor structure) Information about the current print settings in the document. The color management options.',
			],
			1083 => [
				'hex' => '043B',
				'name' => 'PrintStyle',
				'description' => '(Photoshop CS5) Print Style. 4 bytes (descriptor version = 16), Descriptor (see See Descriptor structure) Information about the current print style in the document. The printing marks, labels, ornaments, etc.',
			],
			1084 => [
				'hex' => '043C',
				'name' => 'MacintoshNSPrintInfo',
				'description' => '(Photoshop CS5) Macintosh NSPrintInfo. Variable OS specific info for Macintosh. NSPrintInfo. It is recommened that you do not interpret or use this data.',
			],
			1085 => [
				'hex' => '043D',
				'name' => 'WindowsDEVMODE',
				'description' => '(Photoshop CS5) Windows DEVMODE. Variable OS specific info for Windows. DEVMODE. It is recommened that you do not interpret or use this data.',
			],
			1086 => [
				'hex' => '043E',
				'name' => 'AutoSaveFilePath',
				'description' => '(Photoshop CS6) Auto Save File Path. Unicode string. It is recommened that you do not interpret or use this data.',
			],
			1087 => [
				'hex' => '043F',
				'name' => 'AutoSaveFormat',
				'description' => '(Photoshop CS6) Auto Save Format. Unicode string. It is recommened that you do not interpret or use this data.',
			],
			1088 => [
				'hex' => '0440',
				'name' => 'PathSelectionState',
				'description' => '(Photoshop CC) Path Selection State. 4 bytes (descriptor version = 16), Descriptor (see See Descriptor structure) Information about the current path selection state.',
			],
			/*
			2000 => 07D0
			.
			.
			.
			2997 => 0BB6 Path Information (saved paths). See See Path resource format.
			*/
			2999 => [
				'hex' => '0BB7',
				'name' => 'ClippingPathName',
				'description' => 'Name of clipping path. See See Path resource format.',
			],
			3000 => [
				'hex' => '0BB8',
				'name' => 'OriginPathInfo',
				'description' => '(Photoshop CC) Origin Path Info. 4 bytes (descriptor version = 16), Descriptor (see See Descriptor structure) Information about the origin path data.',
			],
			/*
			4000 => 0FA0
			.
			.
			.
			4999 => 1387 Plug-In resource(s). Resources added by a plug-in. See the plug-in API found in the SDK documentation
			*/
			7000 => [
				'hex' => '1B58',
				'name' => 'ImageReadyVariables',
				'description' => 'Image Ready variables. XML representation of variables definition',
			],
			7001 => [
				'hex' => '1B59',
				'name' => 'ImageReadyDataSets',
				'description' => 'Image Ready data sets',
			],
			7002 => [
				'hex' => '1B5A',
				'name' => 'ImageReadyDefaultSelectedState',
				'description' => 'Image Ready default selected state',
			],
			7003 => [
				'hex' => '1B5B',
				'name' => 'ImageReady7RolloverExpandedState',
				'description' => 'Image Ready 7 rollover expanded state',
			],
			7004 => [
				'hex' => '1B5C',
				'name' => 'ImageReadyRolloverExpandedState',
				'description' => 'Image Ready rollover expanded state',
			],
			7005 => [
				'hex' => '1B5D',
				'name' => 'ImageReadySaveLayerSettings',
				'description' => 'Image Ready save layer settings',
			],
			7006 => [
				'hex' => '1B5E',
				'name' => 'ImageReadyVersion',
				'description' => 'Image Ready version',
			],
			8000 => [
				'hex' => '1F40',
				'name' => 'LightroomWorkflow',
				'description' => '(Photoshop CS3) Lightroom workflow, if present the document is in the middle of a Lightroom workflow.',
			],
			10000 => [
				'hex' => '2710',
				'name' => 'PrintFlagsInfo',
				'description' => 'Print flags information. 2 bytes version ( = 1), 1 byte center crop marks, 1 byte ( = 0), 4 bytes bleed width value, 2 bytes bleed width scale.',
			],
		];

		public static function getTagClass (int $id) : string {
			$tagClass = IRBTag::class . (self::IRIDS[$id]['name'] ?? '');

			return class_exists($tagClass) ? $tagClass : IRBTag::class;
		}

		public static function getTagName (int $id) : ?string {
			return self::IRIDS[$id]['name'] ?? null;
		}

		public static function getTagDescription (int $id) : ?string {
			return self::IRIDS[$id]['description'] ?? null;
		}
	}
