import { Link } from "@inertiajs/react";
import { useTranslationsStore } from "@narsil-localization/Stores/translationStore";
import AppHead from "@narsil-ui/Components/App/AppHead";
import Button from "@narsil-ui/Components/Button/Button";
import Fullscreen from "@narsil-ui/Components/Fullscreen/Fullscreen";
import FullscreenToggle from "@narsil-ui/Components/Fullscreen/FullscreenToggle";
import Section from "@narsil-ui/Components/Section/Section";
import SectionContent from "@narsil-ui/Components/Section/SectionContent";
import SectionFooter from "@narsil-ui/Components/Section/SectionFooter";
import SectionHeader from "@narsil-ui/Components/Section/SectionHeader";
import SectionTitle from "@narsil-ui/Components/Section/SectionTitle";

interface Props {
	status: string;
}

const Index = ({ status }: Props) => {
	const { trans } = useTranslationsStore();

	const title = trans("Email validation");

	return (
		<>
			<AppHead
				description={title}
				keywords={title}
				title={title}
			/>
			<Fullscreen>
				<Section>
					<SectionHeader>
						<SectionTitle>{title}</SectionTitle>
						<FullscreenToggle />
					</SectionHeader>
					<SectionContent>
						<div>
							<span className='mr-1'>{trans("We have sent you the verification email.")}</span>
							<span>{trans("If you cannon find the email, please also check the spam folder.")}</span>
						</div>

						<div>{trans("If you have not received the email, please click on the button below.")}</div>

						{status ? <span className='text-constructive font-medium'>{status}</span> : null}
					</SectionContent>
					<SectionFooter>
						<Button asChild={true}>
							<Link
								href={route("verification.send")}
								method='post'
							>
								{trans("Send again")}
							</Link>
						</Button>
					</SectionFooter>
				</Section>
			</Fullscreen>
		</>
	);
};

export default Index;
